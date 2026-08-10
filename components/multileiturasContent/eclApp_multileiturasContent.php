<?php

class eclApp_multileiturasContent extends eclApp
{
    public static $name = '-home';
    public static $content = 'multileiturasHome_main';

    public static function constructorHelper(eclEngine_application $me): void
    {
        $me->path = $me->parent->path;
    }

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasHome_main';
    }
    public static function view_main(eclEngine_page $page): void
    {
        $page->components->content = 'multileiturasHome_main';

        $about = $page->domain->child('sobre');
        $page->components->list->appendChild($about)
        ->swapTitle()
        ->url($about->path);
    }
}
