
class eclApp_multileiturasAdminLivros_detalhes extends eclApp {

    static name = '-default';
    static map = ['multileiturasAdminLivros_detalhes_registro', 'multileiturasAdminLivros_detalhes_remover'];
    static content = 'multileiturasAdminLivros_detalhes_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminLivros_detalhes_main';
    }

}
