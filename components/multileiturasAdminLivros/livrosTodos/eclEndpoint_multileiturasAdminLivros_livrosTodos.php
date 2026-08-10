<?php

class eclEndpoint_multileiturasAdminLivros_livrosTodos extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $books = $io->database->select($store->multileituras_book, ['mode' => eclStore_multileituras_book::MODE_BOOK]);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
