<?php

class eclApp_multileiturasAdminContent extends eclApp
{
    public static $name = 'content';
    public static $map = ['multileiturasAdminContent_cadastrar', 'multileiturasAdminContent_detalhes'];
    public static $content = 'multileiturasAdminContent_main';

        static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminContent_main';
    }

}
