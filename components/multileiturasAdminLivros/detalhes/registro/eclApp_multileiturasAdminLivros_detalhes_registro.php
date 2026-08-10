<?php

class eclApp_multileiturasAdminLivros_detalhes_registro extends eclApp
{
    public static $name = '-editar-registro';
    public static $content = 'multileiturasAdminLivros_detalhes_registro_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_detalhes_registro_main';
    }

}
