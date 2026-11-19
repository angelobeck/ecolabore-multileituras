<?php

class eclEndpoint_multileiturasLivro_audiobook extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;

        // O nome vem da rota apenas para localizar o livro; o recurso assinado
        // e gerado a partir do registro do banco.
        $name = $this->page->application->parent->name;
        $book = $store->multileituras_book->open($name);
        if (!$book || (int) $book['mode'] !== eclStore_multileituras_book::MODE_BOOK)
            return $this->error(['message' => 'multileiturasLivro_errorNotFound']);

        $message = eclEndpoint_multileiturasLivro::bookRestrictions($this->page, $book, 'audio');
        if (strlen($message))
            return $this->error(['message' => $message]);

        if (empty($book['format_audio']))
            return $this->error(['message' => 'multileiturasLivro_errorNoAudio']);

        $bookName = (string) $book['name'];
        if (!preg_match('/^[a-z0-9_.-]+$/i', $bookName))
            return $this->error(['message' => 'multileiturasLivro_errorNotFound']);

        if (!eclIo_multileiturasLivro_cloudFront::issue($bookName)) {
            http_response_code(503);
            return $this->error(['message' => 'multileiturasLivro_errorAudioUnavailable']);
        }

        return $this->response([
            'book' => $book,
            'url' => eclIo_multileiturasLivro_cloudFront::resourceUrl($bookName)
        ]);
    }

}
