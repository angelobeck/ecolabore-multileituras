
class eclApp_multileiturasAdminLivros extends eclApp
{
    static name = 'livros';
    static map = ['multileiturasAdminLivros_livrosCadastrar', 'multileiturasAdminLivros_livrosTodos', 'multileiturasAdminLivros_generosTodos', 'multileiturasAdminLivros_detalhes'];
    static content = 'multileiturasAdminLivros_main';

       static dispatch() {
        page.components.content = 'multileiturasAdminLivros_main';
    }

}
