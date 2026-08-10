<?php

class eclEndpoint_multileiturasLivros_recentes extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;

        $where = [
            'mode' => eclStore_multileituras_book::MODE_BOOK,
            'adult' => 0
        ];

        $recents = $io->database->select($store->multileituras_book, $where, 30, [], 'created', 'DESC');

        return $this->response(['children' => $recents]);
    }

}
