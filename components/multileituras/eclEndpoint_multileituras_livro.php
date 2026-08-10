<?php

class eclEndpoint_multileituras_livro extends eclEndpoint
{

    public function dispatch(array $where): array
    {
        global $io, $store;


        $rows = $store->multileituras_book->search($where);
        return [
            'response' => $rows
        ];
    }

}
