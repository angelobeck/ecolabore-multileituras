<?php

class eclApp_multileiturasEstante extends eclApp
{
    public static $name = 'estante';
    public static $map = ['multileiturasLogin', 'multileiturasPerfil'];
    public static $content = 'multileiturasEstante_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasEstante_main';
    }
}
