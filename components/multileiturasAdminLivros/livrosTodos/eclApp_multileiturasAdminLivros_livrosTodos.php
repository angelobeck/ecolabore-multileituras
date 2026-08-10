<?php

class eclApp_multileiturasAdminLivros_livrosTodos extends eclApp
{
    public static $name = 'livros';
    public static $map = ['multileiturasAdminLivros_livrosDetalhes'];
    public static $content = 'multileiturasAdminLivros_livrosTodos_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_livrosTodos_main';
    }

}
