<?php

class eclApp_multileiturasComunidade_usuariosTodos extends eclApp
{
    public static $name = '-todos';
    public static $map = ['multileiturasComunidade_perfil'];
    public static $content = 'multileiturasComunidade_usuariosTodos_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasComunidade_usuariosTodos_main';
    }

}
