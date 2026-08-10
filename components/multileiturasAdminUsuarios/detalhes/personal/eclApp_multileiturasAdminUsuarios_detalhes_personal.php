<?php

class eclApp_multileiturasAdminUsuarios_detalhes_personal extends eclApp
{
    public static $name = 'personal';
    public static $content = 'multileiturasAdminUsuarios_detalhes_personal_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_detalhes_personal_main';
    }

}
