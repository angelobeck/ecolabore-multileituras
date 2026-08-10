<?php

class eclApp_multileiturasAdminUsuarios_bloqueadosLista extends eclApp
{
    public static $name = '-bloqueados';
    public static $content = 'multileiturasAdminUsuarios_bloqueadosLista_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_bloqueadosLista_main';
    }

}
