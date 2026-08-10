<?php

class eclApp_multileiturasAdminSistema_export extends eclApp
{
    public static $name = 'export';
    public static $content = 'multileiturasAdminSistema_export_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminSistema_export_main';
    }

}
