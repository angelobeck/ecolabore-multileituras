<?php

class eclApp_multileiturasAdminUsuarios_detalhes_password extends eclApp
{
    public static $name = 'password';
    public static $content = 'multileiturasAdminUsuarios_detalhes_password_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_detalhes_password_main';
    }

}
