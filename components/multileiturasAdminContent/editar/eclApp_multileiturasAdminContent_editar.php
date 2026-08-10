<?php

class eclApp_multileiturasAdminContent_editar extends eclApp
{
    public static $name = '-editar-pagina';
    public static $content = 'multileiturasAdminContent_editar_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminContent_editar_main';
    }

}
