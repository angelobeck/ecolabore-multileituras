<?php

class eclApp_multileiturasAdminUsuarios_verificarLista extends eclApp
{
    public static $name = '-verificar';
    public static $map = ['multileiturasAdminUsuarios_verificar'];
    public static $content = 'multileiturasAdminUsuarios_verificarLista_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_verificarLista_main';
    }

}
