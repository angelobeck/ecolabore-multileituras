<?php

class eclApp_multileiturasAdminLivros extends eclApp
{
    public static $name = 'livros';
    public static $map = ['multileiturasAdminLivros_livrosCadastrar', 'multileiturasAdminLivros_livrosTodos', 'multileiturasAdminLivros_generosTodos', 'multileiturasAdminLivros_detalhes'];
    public static $content = 'multileiturasAdminLivros_main';

        static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_main';
    }

}
