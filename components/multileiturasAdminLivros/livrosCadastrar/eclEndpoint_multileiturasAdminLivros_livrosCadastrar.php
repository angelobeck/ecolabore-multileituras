<?php

class eclEndpoint_multileiturasAdminLivros_livrosCadastrar extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        if (!isset($input['text']))
            return $this->error('');

        $formulary = $this->page->createFormulary('multileiturasAdminLivros_detalhes_edit');
            $formulary->sanitize($input);
            if ($formulary->error)
                return $this->error($formulary->error);

            $data = eclEndpoint_multileiturasAdminLivros_detalhes_registro::prepareBook($formulary->data);

                    $where = [
            'name' => $data['name'],
            'mode' => eclStore_multileituras_book::MODE_BOOK
        ];
        $rows = $io->database->select($store->multileituras_book, $where);
        if($rows)
            $data['name'] = eclIo_convert::slug($data['name'] . '_-_' . $data['author_name']);

            $store->multileituras_book->insert($data);

            return $this->response($data);
    }

}
