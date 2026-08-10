<?php

class eclEndpoint_multileiturasLivros_autoresDetalhes extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $where = [
            'mode' => eclStore_multileituras_book::MODE_BOOK,
            'author_name' => $this->page->application->name
    ];
        $books = $store->multileituras_book->search($where);

                $where = [
            'mode' => eclStore_multileituras_book::MODE_AUTHOR,
            'name' => $this->page->application->name
    ];
        $author = $store->multileituras_book->search($where);
        
        return [
            'response' => [
                'children' => $books,
                'author' => $author[0] ?? []
            ]
        ];
    }

}
