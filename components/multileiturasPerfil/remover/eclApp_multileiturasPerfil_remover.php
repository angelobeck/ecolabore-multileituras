<?php

class eclApp_multileiturasPerfil_remover extends eclApp
{
    public static $name = '-remover';
    public static $content = 'multileiturasPerfil_remover_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasPerfil_remover_main';
    }

}
