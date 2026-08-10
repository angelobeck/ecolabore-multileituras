<?php

class eclApp_multileiturasPerfil_password extends eclApp
{
    public static $name = 'password';
    public static $content = 'multileiturasPerfil_password_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasPerfil_password_main';
    }

}
