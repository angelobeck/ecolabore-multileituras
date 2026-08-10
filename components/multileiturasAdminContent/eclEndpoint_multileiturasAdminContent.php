<?php

class eclEndpoint_multileiturasAdminContent extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;
        $children = $store->multileituras_content->mode(1, 'section');
        return $this->response(['children' => $children]);
    }

}
