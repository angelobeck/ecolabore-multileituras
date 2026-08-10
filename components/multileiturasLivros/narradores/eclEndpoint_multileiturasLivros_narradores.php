<?php

class eclEndpoint_multileiturasLivros_narradores extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $books = $store->multileituras_book->search(['mode' => eclStore_multileituras_book::MODE_NARRATOR]);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
