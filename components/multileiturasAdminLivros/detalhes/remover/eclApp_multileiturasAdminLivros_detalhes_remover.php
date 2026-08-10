<?php

class eclApp_multileiturasAdminLivros_detalhes_remover extends eclApp
{
    public static $name = '-remover';
    public static $content = 'multileiturasAdminLivros_detalhes_remover_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_detalhes_remover_main';
    }

}
