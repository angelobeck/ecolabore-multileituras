<?php

class eclApp_multileiturasPerfil_public extends eclApp
{
    public static $name = 'public';
    public static $content = 'multileiturasPerfil_public_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasPerfil_public_main';
    }

}
