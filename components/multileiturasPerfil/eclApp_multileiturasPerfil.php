<?php

class eclApp_multileiturasPerfil extends eclApp
{
    public static $name = 'perfil';
    public static $map = ['multileiturasPerfil_public', 'multileiturasPerfil_personal', 'multileiturasPerfil_password', 'multileiturasPerfil_remover'];
    public static $content = 'multileiturasPerfil_main';
    public static $access = 1;

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasPerfil_main';
        $page->endpoints->file = 'multileiturasPerfil_file';
    }
}
