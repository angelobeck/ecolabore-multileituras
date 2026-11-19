<?php

/**
 * Emissor de Signed Cookies do CloudFront para os audiolivros (issue #1).
 *
 * Responsabilidade unica: montar a politica customizada, assinar e chamar
 * setcookie(). Autorizacao (sessao, restricoes do livro) e responsabilidade
 * de quem chama.
 *
 * Constantes esperadas (config.php nao versionado ou variaveis de ambiente):
 *   AUDIO_CDN_URL                 ex.: 'https://cdn.acic.org.br/'
 *   CLOUDFRONT_KEY_PAIR_ID        Public key ID cadastrado na key group
 *   CLOUDFRONT_PRIVATE_KEY_FILE   caminho da chave privada RSA (PEM), fora da raiz publica
 *   AUDIO_COOKIE_DOMAIN           ex.: '.acic.org.br'
 *   AUDIO_COOKIE_TTL              segundos (ex.: 900)
 *
 * Nunca registra/retorna a chave privada, a politica ou a assinatura.
 */
class eclIo_multileiturasLivro_cloudFront
{
    const COOKIE_POLICY = 'CloudFront-Policy';
    const COOKIE_SIGNATURE = 'CloudFront-Signature';
    const COOKIE_KEY_PAIR_ID = 'CloudFront-Key-Pair-Id';

    // Os cookies validos sao reaproveitados enquanto restar mais que esta fracao do TTL.
    const RENEW_FRACTION = 3;

    private static $privateKey = null;

    /**
     * Retorna '' se a configuracao estiver completa, ou o motivo (sem segredos).
     */
    public static function configurationError(): string
    {
        foreach (['AUDIO_CDN_URL', 'CLOUDFRONT_KEY_PAIR_ID', 'CLOUDFRONT_PRIVATE_KEY_FILE', 'AUDIO_COOKIE_DOMAIN', 'AUDIO_COOKIE_TTL'] as $constant) {
            if (!defined($constant) || constant($constant) === false || constant($constant) === null || constant($constant) === '')
                return 'constante ' . $constant . ' ausente';
        }

        if (!preg_match('#^https://[a-z0-9.-]+/$#i', AUDIO_CDN_URL))
            return 'AUDIO_CDN_URL deve ser https e terminar com /';

        if (!preg_match('/^[A-Z0-9]+$/', CLOUDFRONT_KEY_PAIR_ID))
            return 'CLOUDFRONT_KEY_PAIR_ID com formato invalido';

        if ((!is_int(AUDIO_COOKIE_TTL) && !ctype_digit((string) AUDIO_COOKIE_TTL)) || (int) AUDIO_COOKIE_TTL < 60)
            return 'AUDIO_COOKIE_TTL deve ser inteiro >= 60';

        if (!is_file(CLOUDFRONT_PRIVATE_KEY_FILE) || !is_readable(CLOUDFRONT_PRIVATE_KEY_FILE))
            return 'arquivo da chave privada inexistente ou ilegivel';

        if (!self::privateKey())
            return 'chave privada invalida';

        return '';
    }

    /**
     * URL publica (CloudFront) do audio do livro. $bookName deve vir do banco.
     */
    public static function resourceUrl(string $bookName): string
    {
        return AUDIO_CDN_URL . rawurlencode($bookName) . '.mp3';
    }

    /**
     * Politica customizada, serializada sem espacos (assinatura deterministica).
     */
    public static function buildPolicy(string $resource, int $expires): string
    {
        return json_encode([
            'Statement' => [[
                'Resource' => $resource,
                'Condition' => ['DateLessThan' => ['AWS:EpochTime' => $expires]]
            ]]
        ], JSON_UNESCAPED_SLASHES);
    }

    /**
     * Base64 no formato aceito pelo CloudFront: '+' => '-', '=' => '_', '/' => '~'.
     */
    public static function urlSafeBase64(string $data): string
    {
        return strtr(base64_encode($data), '+=/', '-_~');
    }

    public static function urlSafeBase64Decode(string $data): string|false
    {
        return base64_decode(strtr($data, '-_~', '+=/'), true);
    }

    /**
     * Assina com RSA-SHA1, algoritmo exigido pelo CloudFront para chaves RSA
     * em signed URLs/cookies.
     */
    public static function sign(string $policy): string|false
    {
        $key = self::privateKey();
        if (!$key)
            return false;

        $signature = '';
        if (!openssl_sign($policy, $signature, $key, OPENSSL_ALGO_SHA1))
            return false;

        return self::urlSafeBase64($signature);
    }

    /**
     * Calcula os tres cookies para o recurso. Nao envia nada.
     */
    public static function buildCookies(string $resource, int $expires): array|false
    {
        $policy = self::buildPolicy($resource, $expires);
        $signature = self::sign($policy);
        if ($signature === false)
            return false;

        return [
            self::COOKIE_POLICY => self::urlSafeBase64($policy),
            self::COOKIE_SIGNATURE => $signature,
            self::COOKIE_KEY_PAIR_ID => CLOUDFRONT_KEY_PAIR_ID
        ];
    }

    /**
     * Verifica se os cookies recebidos ja autorizam $resource com folga suficiente.
     */
    public static function hasValidCookies(string $resource, array $cookies, int $now): bool
    {
        if (!isset($cookies[self::COOKIE_POLICY], $cookies[self::COOKIE_SIGNATURE], $cookies[self::COOKIE_KEY_PAIR_ID]))
            return false;

        if (!is_string($cookies[self::COOKIE_POLICY]) || !is_string($cookies[self::COOKIE_SIGNATURE]) || $cookies[self::COOKIE_KEY_PAIR_ID] !== CLOUDFRONT_KEY_PAIR_ID)
            return false;

        $policy = self::urlSafeBase64Decode($cookies[self::COOKIE_POLICY]);
        $signature = self::urlSafeBase64Decode($cookies[self::COOKIE_SIGNATURE]);
        if ($policy === false || $signature === false)
            return false;

        $data = json_decode($policy, true);
        if (!isset($data['Statement'][0]['Resource'], $data['Statement'][0]['Condition']['DateLessThan']['AWS:EpochTime']) || count($data['Statement']) !== 1)
            return false;

        if ($data['Statement'][0]['Resource'] !== $resource)
            return false;

        $expires = (int) $data['Statement'][0]['Condition']['DateLessThan']['AWS:EpochTime'];
        if ($expires - $now <= intdiv((int) AUDIO_COOKIE_TTL, self::RENEW_FRACTION))
            return false;

        $key = self::privateKey();
        if (!$key)
            return false;
        $details = openssl_pkey_get_details($key);
        return openssl_verify($policy, $signature, $details['key'], OPENSSL_ALGO_SHA1) === 1;
    }

    /**
     * Dominio dos cookies: AUDIO_COOKIE_DOMAIN somente quando a aplicacao
     * roda em acic.org.br (ou subdominio); caso contrario, cookie host-only.
     */
    public static function cookieDomain(string $applicationHost): string
    {
        $host = strtolower(explode('/', $applicationHost)[0]);
        $host = explode(':', $host)[0];
        $domain = strtolower(ltrim(AUDIO_COOKIE_DOMAIN, '.'));

        if ($host === $domain || str_ends_with($host, '.' . $domain))
            return '.' . $domain;

        return '';
    }

    /**
     * Emite os cookies para o audio do livro, se ainda nao houver cookies validos.
     * Retorna false (sem emitir nada) em caso de erro; o motivo vai para o log.
     */
    public static function issue(string $bookName, int $now = TIME): bool
    {
        $error = self::configurationError();
        if ($error !== '') {
            error_log('[multileituras audio] CloudFront signed cookies indisponiveis: ' . $error);
            return false;
        }

        $resource = self::resourceUrl($bookName);
        if (self::hasValidCookies($resource, $_COOKIE, $now))
            return true;

        $expires = $now + (int) AUDIO_COOKIE_TTL;
        $cookies = self::buildCookies($resource, $expires);
        if ($cookies === false) {
            error_log('[multileituras audio] falha ao assinar a politica CloudFront');
            return false;
        }

        if (headers_sent()) {
            error_log('[multileituras audio] headers ja enviados; cookies CloudFront nao emitidos');
            return false;
        }

        $options = [
            'expires' => $expires,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Lax'
        ];
        $domain = self::cookieDomain(SERVER_HOST);
        if ($domain !== '')
            $options['domain'] = $domain;

        foreach ($cookies as $name => $value) {
            // setrawcookie: os valores ja estao no alfabeto seguro do CloudFront
            // e nao podem ser re-codificados por urlencode().
            setrawcookie($name, $value, $options);
        }

        return true;
    }

    private static function privateKey(): OpenSSLAsymmetricKey|false
    {
        if (self::$privateKey === null) {
            $pem = @file_get_contents(CLOUDFRONT_PRIVATE_KEY_FILE);
            $key = $pem === false ? false : openssl_pkey_get_private($pem);
            unset($pem);
            if ($key) {
                $details = openssl_pkey_get_details($key);
                if (($details['type'] ?? null) !== OPENSSL_KEYTYPE_RSA)
                    $key = false;
            }
            self::$privateKey = $key;
        }
        return self::$privateKey;
    }

}
