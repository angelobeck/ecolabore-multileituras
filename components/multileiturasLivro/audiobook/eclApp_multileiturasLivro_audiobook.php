<?php

class eclApp_multileiturasLivro_audiobook extends eclApp
{
    public static $name = 'audiobook';
    public static $map = ['multileiturasLivro_downloadProxy'];
    public static $content = 'multileiturasLivro_audiobook_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivro_audiobook_main';
    }

}
