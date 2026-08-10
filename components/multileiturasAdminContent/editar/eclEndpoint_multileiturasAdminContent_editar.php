<?php

class eclEndpoint_multileiturasAdminContent_editar extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;
        $name = $this->page->application->parent->name;
        $page = &$store->multileituras_content->open(1, $name);
        if (!$page)
            return $this->error();

        if (isset($input['fields'])) {
            $formulary = $this->page->createFormulary('multileiturasAdminContent_editar_edit', $page);
            $formulary->sanitize($input['fields']);
            if ($formulary->error)
                return $this->error($formulary->error);

            $page = $formulary->data;
        }

        return $this->response(['fields' => $page]);
    }

}
