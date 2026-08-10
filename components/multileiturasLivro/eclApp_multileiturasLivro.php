<?php

class eclApp_multileiturasLivro extends eclApp
{
    public static $name = '-default';
    public static $map = ['multileiturasLivro_audiobook', 'multileiturasLivro_download', 'multileiturasLivro_reader'];
    public static $content = 'multileiturasLivro_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivro_main';
    }

}
