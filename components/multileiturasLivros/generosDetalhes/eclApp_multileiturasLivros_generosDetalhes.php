<?php

class eclApp_multileiturasLivros_generosDetalhes extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_generosDetalhes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_generosDetalhes_main';
    }

}
