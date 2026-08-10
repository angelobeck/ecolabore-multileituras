<?php

class eclApp_multileiturasAdminContent_detalhes extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasAdminContent_editar', 'multileiturasAdminContent_remover'];
    public static $content = 'multileiturasAdminContent_detalhes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminContent_detalhes_main';
        $page->endpoints->file = 'multileiturasAdminLivros_detalhes_file';
    }

}
