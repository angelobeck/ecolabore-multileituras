<?php

class eclEndpoint_multileiturasAdminContent_detalhes extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;
        $name = $this->page->application->name;
        $page = $store->multileituras_content->open(1, $name);
        return $this->response(['page' => $page]);
    }

}
