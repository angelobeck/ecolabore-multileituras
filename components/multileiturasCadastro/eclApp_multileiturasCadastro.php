<?php

class eclApp_multileiturasCadastro extends eclApp
{
    public static $name = 'cadastrar';
    public static $content = 'multileiturasCadastro_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasCadastro_main';
        $page->endpoints->file = 'multileiturasCadastro_file';
    }

}
