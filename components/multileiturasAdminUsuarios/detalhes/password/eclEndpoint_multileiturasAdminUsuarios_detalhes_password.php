<?php

class eclEndpoint_multileiturasAdminUsuarios_detalhes_password extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $io, $store;
        $userId = intval($this->page->application->parent->name);

        if(!isset($input['password']))
            return $this->error('');

        $user = &$store->user->openById($userId);
        $user['password'] = $input['password'];

        return $this->response('');
            }
}
