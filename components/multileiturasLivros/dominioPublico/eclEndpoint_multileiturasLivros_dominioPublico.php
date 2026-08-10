<?php

class eclEndpoint_multileiturasLivros_dominioPublico extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $where = [
            'mode' => eclStore_multileituras_book::MODE_BOOK,
            'public' => 1
        ];
        $books = $store->multileituras_book->search($where);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
