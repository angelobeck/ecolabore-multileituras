<?php

class eclApp_multileiturasAdminUsuarios_semDocumentoLista extends eclApp
{
    public static $name = '-sem-documento';
    public static $content = 'multileiturasAdminUsuarios_semDocumentoLista_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_semDocumentoLista_main';
    }

}
