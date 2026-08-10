<?php

class eclApp_multileiturasAdminSistema_php extends eclApp
{
    public static $name = 'php';
    public static $content = 'multileiturasAdminSistema_php_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminSistema_php_main';
    }

}
