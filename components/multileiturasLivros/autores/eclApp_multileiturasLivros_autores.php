<?php

class eclApp_multileiturasLivros_autores extends eclApp
{
    public static $name = '-autores';
    public static $map = ['multileiturasLivros_autoresDetalhes'];
    public static $content = 'multileiturasLivros_autores_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_autores_main';
    }

}
