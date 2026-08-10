<?php

class eclApp_multileiturasAdminUsuarios_detalhes_remover extends eclApp
{
    public static $name = '-remover';
    public static $content = 'multileiturasAdminUsuarios_detalhes_remover_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_detalhes_remover_main';
    }

}
