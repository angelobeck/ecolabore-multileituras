<?php

class eclApp_multileiturasAdminLivros_generosTodos extends eclApp
{
    public static function isChild(eclEngine_application $parent, string $name): bool
    {
        switch ($name) {
            case '-autores':
            case '-generos':
            case '-narradores':
                return true;
            default:
                return false;
        }
    }

    public static function childrenNames(eclEngine_application $parent): array
    {
        return ['-autores', '-generos', '-narradores'];
    }

    public static function constructorHelper(eclEngine_application $me): void
    {
        global $store;
        switch ($me->name) {
            case '-autores':
                $me->data = $store->staticContent->open('multileiturasAdminLivros_generosTodos_autores');
                break;

            case '-generos':
                $me->data = $store->staticContent->open('multileiturasAdminLivros_generosTodos_main');
                break;

            case '-narradores':
                $me->data = $store->staticContent->open('multileiturasAdminLivros_generosTodos_narradores');
        }

        $me->map = ['multileiturasAdminLivros_generosDetalhes'];
    }

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminLivros_generosTodos_main';
    }

}
