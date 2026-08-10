<?php

class eclApp_multileiturasLivros_generos extends eclApp
{
    public static $name = '-generos';
    public static $map = ['multileiturasLivros_generosDetalhes'];
    public static $content = 'multileiturasLivros_generos_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_generos_main';
    }

}
