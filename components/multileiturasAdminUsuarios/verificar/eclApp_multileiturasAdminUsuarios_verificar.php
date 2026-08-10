<?php

class eclApp_multileiturasAdminUsuarios_verificar extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasAdminUsuarios_detalhes_inlineDocument', 'multileiturasAdminUsuarios_detalhes_inlineImage'];
    public static $content = 'multileiturasAdminUsuarios_verificar_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_verificar_main';
    }

}
