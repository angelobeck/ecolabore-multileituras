<?php

class eclApp_multileiturasLivros_audiobooks extends eclApp
{
    public static $name = '-audiobooks';
    public static $map = ['multileiturasLivro'];
    public static $content = 'multileiturasLivros_audiobooks_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_audiobooks_main';
    }

}
