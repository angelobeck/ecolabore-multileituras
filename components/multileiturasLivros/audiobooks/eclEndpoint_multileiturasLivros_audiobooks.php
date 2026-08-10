<?php

class eclEndpoint_multileiturasLivros_audiobooks extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $where = [
            'mode' => eclStore_multileituras_book::MODE_BOOK,
            'format_audio' => 1
        ];
        $books = $store->multileituras_book->search($where);
        return [
            'response' => [
                'children' => $books
            ]
        ];
    }

}
