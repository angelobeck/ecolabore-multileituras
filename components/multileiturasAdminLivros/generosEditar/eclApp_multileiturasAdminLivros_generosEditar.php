<?php

class eclApp_multileiturasAdminLivros_generosEditar extends eclApp
{
    public static $name = '-editar-registro';
    public static $content = 'multileiturasAdminLivros_generosEditar_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_generosEditar_main';
    }

}
