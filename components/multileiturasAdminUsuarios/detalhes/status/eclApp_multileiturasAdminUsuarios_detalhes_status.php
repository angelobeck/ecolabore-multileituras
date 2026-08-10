<?php

class eclApp_multileiturasAdminUsuarios_detalhes_status extends eclApp
{
    public static $name = 'status';
    public static $content = 'multileiturasAdminUsuarios_detalhes_status_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_detalhes_status_main';
        $page->endpoints->file = 'multileiturasAdminUsuarios_detalhes_status_file';
    }

}
