
class eclApp_multileiturasAdminUsuarios_usuariosTodos extends eclApp {
    static name = '-todos';
    static map = ['multileiturasAdminUsuarios_detalhes'];
    static content = 'multileiturasAdminUsuarios_usuariosTodos_main';

    static dispatch() {
page.components.list = 'multileiturasAdminUsuarios_usuariosTodos_main';
    }
}
