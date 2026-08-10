<?php

class eclApp_multileiturasAdminSistema_request extends eclApp
{
    public static $name = 'request';
    public static $content = 'multileiturasAdminSistema_request_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminSistema_request_main';
    }

}
