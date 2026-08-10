<?php

class eclApp_multileiturasLivros_narradores extends eclApp
{
    public static $name = '-narradores';
    public static $map = ['multileiturasLivros_narradoresDetalhes'];
    public static $content = 'multileiturasLivros_narradores_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasLivros_narradores_main';
    }

}
