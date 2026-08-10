<?php

class eclApp_multileiturasAdminLivros_detalhes extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasAdminLivros_detalhes_registro', 'multileiturasAdminLivros_detalhes_remover'];
    public static $content = 'multileiturasAdminLivros_detalhes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_detalhes_main';
        $page->endpoints->file = 'multileiturasAdminLivros_detalhes_file';
    }

}
