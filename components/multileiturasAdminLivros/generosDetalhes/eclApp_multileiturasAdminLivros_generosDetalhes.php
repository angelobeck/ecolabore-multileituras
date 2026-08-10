<?php

class eclApp_multileiturasAdminLivros_generosDetalhes extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasAdminLivros_generosEditar', 'multileiturasAdminLivros_generosRemover'];
    public static $content = 'multileiturasAdminLivros_generosDetalhes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_generosDetalhes_main';
        $page->endpoints->file = 'multileiturasAdminLivros_detalhes_file';
    }

}
