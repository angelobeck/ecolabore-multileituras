<?php

class eclApp_multileiturasLivros_recentes extends eclApp
{
    public static $name = '-recentes';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_recentes_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_recentes_main';
    }

}
