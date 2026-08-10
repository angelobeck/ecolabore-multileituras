<?php

class eclEndpoint_multileiturasLivros_narradoresDetalhes extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;
        $where = [
            'mode' => eclStore_multileituras_book::MODE_BOOK,
            'narrator_name' => $this->page->application->name
    ];
        $books = $store->multileituras_book->search($where);

                $where = [
            'mode' => eclStore_multileituras_book::MODE_NARRATOR,
            'name' => $this->page->application->name
    ];
        $narrators = $store->multileituras_book->search($where);

        return [
            'response' => [
                'children' => $books,
                'narrator' => $narrators[0] ?? []
            ]
        ];
    }

}
