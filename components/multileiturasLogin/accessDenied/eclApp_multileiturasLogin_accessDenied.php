<?php

class eclApp_multileiturasLogin_accessDenied extends eclApp
{
    public static $name = '-access-denied';
    public static $map = [];
    public static $content = 'multileiturasLogin_accessDenied_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLogin_main';
    }

}
