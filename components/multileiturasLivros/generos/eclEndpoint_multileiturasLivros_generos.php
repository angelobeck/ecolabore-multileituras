<?php

class eclEndpoint_multileiturasLivros_generos extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;
        $books = $store->multileituras_book->search(['mode' => eclStore_multileituras_book::MODE_GENRE]);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
