<?php

class eclApp_multileiturasAdminContent_remover extends eclApp
{
    public static $name = '-remover';
    public static $content = 'multileiturasAdminContent_remover_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminContent_remover_main';
    }

}
