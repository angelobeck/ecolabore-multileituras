<?php

class eclEndpoint_multileiturasAdminUsuarios_usuariosTodos extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $where = ['name' => '-personal'];
            $rows = $io->database->select($store->userContent, $where);

            return $this->response(['children' => $rows]);
    }

}
