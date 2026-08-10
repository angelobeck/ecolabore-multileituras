<?php

class eclApp_multileiturasLivro_reader extends eclApp
{
    public static $name = 'reader';
    public static $content = 'multileiturasLivro_reader_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivro_reader_main';
    }

}
