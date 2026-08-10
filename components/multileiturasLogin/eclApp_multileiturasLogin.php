<?php

class eclApp_multileiturasLogin extends eclApp
{
    public static $name = '-login';
    public static $map = [];
    public static $content = 'multileiturasLogin_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLogin_main';
    }

}
