<?php

class eclApp_multileiturasAdminLivros_generosRemover extends eclApp
{
    public static $name = '-remover';
    public static $content = 'multileiturasAdminLivros_generosRemover_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_generosRemover_main';
    }

}
