<?php

class eclApp_multileiturasAdminUsuarios extends eclApp
{
    public static $name = 'usuarios';
    public static $map = ['multileiturasAdminUsuarios_usuariosCadastrar', 'multileiturasAdminUsuarios_semDocumentoLista', 'multileiturasAdminUsuarios_verificarLista', 'multileiturasAdminUsuarios_bloqueadosLista', 'multileiturasAdminUsuarios_usuariosTodos', 'multileiturasAdminUsuarios_gruposCadastrar', 'multileiturasAdminUsuarios_gruposTodos', 'multileiturasAdminUsuarios_detalhes'];
    public static $content = 'multileiturasAdminUsuarios_main';

    static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminUsuarios_main';
    }

}
