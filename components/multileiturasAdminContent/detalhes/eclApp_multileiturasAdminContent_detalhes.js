
class eclApp_multileiturasAdminContent_detalhes extends eclApp {

    static name = '-default';
    static map = ['multileiturasAdminContent_editar', 'multileiturasAdminContent_remover'];
    static content = 'multileiturasAdminContent_detalhes_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminContent_detalhes_main';
    }

}
