<?php

class eclApp_multileiturasLogin_invalidSession extends eclApp
{
    public static $name = '-invalid-session';
    public static $map = [];
    public static $content = 'multileiturasLogin_invalidSession_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLogin_main';
    }

}
