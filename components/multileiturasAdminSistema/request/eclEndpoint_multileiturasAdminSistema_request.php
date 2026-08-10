<?php

class eclEndpoint_multileiturasAdminSistema_request extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        return [
            'response' => [
                'message' => 'Olá mundo!',
                'input' => $input
            ]
        ];
    }

}
