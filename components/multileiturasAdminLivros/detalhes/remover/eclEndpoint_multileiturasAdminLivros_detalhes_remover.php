<?php

class eclEndpoint_multileiturasAdminLivros_detalhes_remover extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;

        if(!isset($input['ok']) or $input['ok'] !== 'ok')
            return $this->error('');

        $name = $this->page->application->parent->name;
        $where = [
            'mode' => eclStore_multileituras_book::MODE_BOOK,
            'name' => $name
    ];
$rows = $io->database->select($store->multileituras_book, $where, 1);

if(count($rows) >= 1) {
    $data = $rows[0];

$io->database->delete($store->multileituras_book, ['id' => $data['id']]);
}

return $this->response('ok');
    }

}
