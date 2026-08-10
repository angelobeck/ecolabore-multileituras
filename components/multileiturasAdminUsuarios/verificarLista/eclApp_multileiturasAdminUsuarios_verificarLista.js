
class eclApp_multileiturasAdminUsuarios_verificarLista extends eclApp {
    static name = '-verificar';
    static map = ['multileiturasAdminUsuarios_verificar'];
    static content = 'multileiturasAdminUsuarios_verificarLista_main';

    static dispatch() {
page.components.list = 'multileiturasAdminUsuarios_verificarLista_main';
    }
}
