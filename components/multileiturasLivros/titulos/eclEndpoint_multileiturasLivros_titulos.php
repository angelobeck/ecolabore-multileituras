<?php

class eclEndpoint_multileiturasLivros_titulos extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $books = $store->multileituras_book->search(['mode' => eclStore_multileituras_book::MODE_BOOK]);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
