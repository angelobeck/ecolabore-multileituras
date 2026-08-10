<?php

class eclApp_multileiturasAdminUsuarios_usuariosCadastrar extends eclApp
{
    public static $name = '-novo-usuario';
    public static $content = 'multileiturasAdminUsuarios_usuariosCadastrar_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_usuariosCadastrar_main';
    }

}
