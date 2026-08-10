
class eclApp_multileiturasAdminUsuarios extends eclApp {
    static name = 'usuarios';
    static map = ['multileiturasAdminUsuarios_usuariosCadastrar', 'multileiturasAdminUsuarios_semDocumentoLista', 'multileiturasAdminUsuarios_verificarLista', 'multileiturasAdminUsuarios_bloqueadosLista', 'multileiturasAdminUsuarios_usuariosTodos', 'multileiturasAdminUsuarios_detalhes'];
    static content = 'multileiturasAdminUsuarios_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminUsuarios_main';
    }

}
