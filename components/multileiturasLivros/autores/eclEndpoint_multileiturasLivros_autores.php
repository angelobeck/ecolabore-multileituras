<?php

class eclEndpoint_multileiturasLivros_autores extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $books = $store->multileituras_book->search(['mode' => eclStore_multileituras_book::MODE_AUTHOR]);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
