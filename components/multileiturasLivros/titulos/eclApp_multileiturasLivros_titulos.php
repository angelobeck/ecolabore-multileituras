<?php

class eclApp_multileiturasLivros_titulos extends eclApp
{
    public static $name = '-titulos';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_titulos_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_titulos_main';
    }

}
