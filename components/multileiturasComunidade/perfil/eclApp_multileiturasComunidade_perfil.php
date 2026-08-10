<?php

class eclApp_multileiturasComunidade_perfil extends eclApp
{
    public static $name = '-default';
    public static $content = 'multileiturasComunidade_perfil_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasComunidade_perfil_main';
    }

}
