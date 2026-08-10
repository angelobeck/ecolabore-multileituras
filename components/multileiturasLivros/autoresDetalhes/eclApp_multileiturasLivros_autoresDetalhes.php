<?php

class eclApp_multileiturasLivros_autoresDetalhes extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_autoresDetalhes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_autoresDetalhes_main';
    }

}
