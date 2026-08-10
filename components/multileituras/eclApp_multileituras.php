<?php

class eclApp_multileituras extends eclApp
{
    public static $name = 'multileituras';
    public static $content = 'multileituras_main';

        static function constructorHelper(eclEngine_application $me): void
    {
        $me->map = [...getMap('multileituras'), 'multileiturasHome', 'multileiturasLivros', 'multileiturasEstante', 'multileiturasComunidade', 'multileiturasAdmin', 'multileiturasCadastro', 'multileiturasLogin', 'multileiturasLogin_accessDenied', 'multileiturasLogin_invalidSession', 'multileiturasContent', 'multileiturasAcets', 'multileiturasNotFound', 'systemJavascript', 'systemStyle'];
    }

    public static function dispatch(eclEngine_page $page): void
    {
        $page->components->dialog = 'multileituras_modDialog_main';
        $page->components->layout = 'multileituras_modLayout_main';
        $page->components->levelUp = 'multileituras_modLevelUp_main';
        $page->components->list = 'multileituras_modList_main';
        $page->components->nav = 'multileituras_modNav_main';
        $page->components->title = 'multileituras_modTitle_main';
        $page->components->user = 'multileituras_modUser_main';

        $page->endpoints->livro = 'multileituras_livro';
    }
}
