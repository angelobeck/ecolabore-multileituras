<?php

class eclApp_multileiturasAdminUsuarios_usuariosTodos extends eclApp
{
    public static $name = '-todos';
    public static $map = ['multileiturasAdminUsuarios_detalhes'];
    public static $content = 'multileiturasAdminUsuarios_usuariosTodos_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_usuariosTodos_main';
    }

}
