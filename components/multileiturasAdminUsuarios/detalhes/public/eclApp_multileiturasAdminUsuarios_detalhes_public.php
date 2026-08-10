<?php

class eclApp_multileiturasAdminUsuarios_detalhes_public extends eclApp
{
    public static $name = 'public';
    public static $content = 'multileiturasAdminUsuarios_detalhes_public_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_detalhes_public_main';
    }

}
