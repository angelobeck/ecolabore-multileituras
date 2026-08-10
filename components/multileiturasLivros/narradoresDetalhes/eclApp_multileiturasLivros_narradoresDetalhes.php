<?php

class eclApp_multileiturasLivros_narradoresDetalhes extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_narradoresDetalhes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_narradoresDetalhes_main';
    }

}
