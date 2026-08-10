<?php

class eclEndpoint_multileiturasAdminLivros_generosRemover extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;

        if (!isset($input['ok']) or $input['ok'] !== 'ok')
            return $this->error();

        $name = $this->page->application->parent->name;
        $parentName = $this->page->application->parent->parent->name;

        if ($parentName == '-autores')
            $mode = eclStore_multileituras_book::MODE_AUTHOR;
        if ($parentName == '-generos')
            $mode = eclStore_multileituras_book::MODE_GENRE;
        else
            $mode = eclStore_multileituras_book::MODE_NARRATOR;

        $where = [
            'name' => $name,
            'mode' => $mode
        ];

        $rows = $io->database->select($store->multileituras_book, $where, 1);
        if (!$rows)
            return $this->error();

        $data = $rows[0];
        $io->database->delete($store->multileituras_book, ['id' => $data['id']]);

        return $this->response('ok');
    }

}
