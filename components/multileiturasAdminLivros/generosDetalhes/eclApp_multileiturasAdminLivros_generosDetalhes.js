
class eclApp_multileiturasAdminLivros_generosDetalhes extends eclApp {

    static name = '-default';
    static map = ['multileiturasAdminLivros_generosEditar', 'multileiturasAdminLivros_generosRemover'];
    static content = 'multileiturasAdminLivros_generosDetalhes_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminLivros_generosDetalhes_main';
    }

}
