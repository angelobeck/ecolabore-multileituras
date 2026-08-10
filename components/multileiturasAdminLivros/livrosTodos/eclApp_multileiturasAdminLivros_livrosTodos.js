
class eclApp_multileiturasAdminLivros_livrosTodos extends eclApp {
    static name = 'livros';
    static map = ['multileiturasAdminLivros_livrosDetalhes'];
    static content = 'multileiturasAdminLivros_livrosTodos_main';

    static dispatch() {
page.components.content = 'multileiturasAdminLivros_livrosTodos_main';
    }
}
