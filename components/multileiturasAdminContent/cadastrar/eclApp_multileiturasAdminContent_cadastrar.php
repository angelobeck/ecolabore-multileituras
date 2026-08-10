<?php

class eclApp_multileiturasAdminContent_cadastrar extends eclApp
{
    public static $name = '-novo';
    public static $content = 'multileiturasAdminContent_cadastrar_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminContent_cadastrar_main';
    }

}
