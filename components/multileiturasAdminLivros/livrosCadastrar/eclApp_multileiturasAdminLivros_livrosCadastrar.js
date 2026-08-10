
class eclApp_multileiturasAdminLivros_livrosCadastrar extends eclApp {
    static name = '-novo-livro';
    static content = 'multileiturasAdminLivros_livrosCadastrar_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminLivros_livrosCadastrar_main';
    }

}
