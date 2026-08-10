<?php

class eclApp_multileiturasAdminLivros_livrosCadastrar extends eclApp
{
    public static $name = '-novo-livro';
    public static $content = 'multileiturasAdminLivros_livrosCadastrar_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_livrosCadastrar_main';
    }

}
