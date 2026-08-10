<?php

class eclApp_multileiturasAdminLivros_inserirDados extends eclApp
{
    public static $name = 'inserir_dados';
    public static $content = 'multileiturasAdminLivros_inserirDados_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_inserirDados_main';
    }

}
