<?php

class eclApp_multileiturasLivro_download extends eclApp
{
    public static $name = 'download';
    public static $map = ['multileiturasLivro_downloadFile'];
    public static $content = 'multileiturasLivro_download_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivro_download_main';
    }

}
