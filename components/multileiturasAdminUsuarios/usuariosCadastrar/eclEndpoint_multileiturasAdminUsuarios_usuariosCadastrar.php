<?php

class eclEndpoint_multileiturasAdminUsuarios_usuariosCadastrar extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;

        if (!isset($input['step']) or !isset($input['fields']))
            return $this->error('');

        $formularyName = $this->getFormularyName($input['step'], $input['fields']);
        $formulary = $this->page->createFormulary($formularyName, $input['fields']);

        if ($formulary->sanitize($input['fields'])) {
            if ($input['step'] === 4) {
                $data = $formulary->data;

                $user = [
                    'name' => $data['identifier'],
                    'phone' => eclIo_convert::extractNumbers($data['details']['countryCode'] . $data['details']['phone']),
                    'mail' => $data['details']['mail'],
                    'document' => eclIo_convert::extractNumbers($data['details']['document']),
                    'password' => $data['password'],
                    'kid' => $data['minor']
                ];

                $userId = $store->user->insert($user);

                $userPersonal = $data;
                $userPersonal['name'] = '-personal';
                $userPersonal['mode'] = 'register';
                $userPersonal['encrypt'] = true;

                $store->userContent->insert($userId, $userPersonal);

                $userPublic = [
                    'name' => '-public',
                    'mode' => 'register',
                    'text' => ['title' => $data['text']['nick']]
                ];

                $keywords = $userPersonal['text']['title']['pt']['value'] ?? '';
                $keywords .= ' ' . $userPublic['text']['title']['pt']['value'] ?? '';
                $keywords .= ' ' . $user['name'];

                $userPublic['keywords'] = eclIo_database::filterKeywords($keywords);

                $store->userContent->insert($userId, $userPublic);

                $data['id'] = $userId;
                return $this->response(['fields' => $data]);
            }

            return $this->response(['fields' => $formulary->data]);
        }

        return $this->error($formulary->error);
    }

    private function getFormularyName(string $step, array $fields): string
    {
        switch ($step) {
            case '1':
                return 'multileiturasCadastro_formularyStart';
            case '2':
                if (isset($fields['minor']) and $fields['minor'])
                    return 'multileiturasCadastro_formularySponsor';
                else
                    return 'multileiturasCadastro_formularyPersonal';
            case '3':
                return 'multileiturasCadastro_formularyPublic';
            case '4':
                return 'multileiturasCadastro_formularyCheckout';
        }
    }

}
