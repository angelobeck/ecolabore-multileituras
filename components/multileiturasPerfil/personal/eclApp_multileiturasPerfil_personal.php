<?php

class eclApp_multileiturasPerfil_personal extends eclApp
{
    public static $name = 'personal';
    public static $content = 'multileiturasPerfil_personal_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasPerfil_personal_main';
    }

}
