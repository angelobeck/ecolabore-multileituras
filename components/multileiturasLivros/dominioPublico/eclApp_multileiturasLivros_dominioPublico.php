<?php

class eclApp_multileiturasLivros_dominioPublico extends eclApp
{
    public static $name = '-dominio-publico';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_dominioPublico_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_dominioPublico_main';
    }

}
