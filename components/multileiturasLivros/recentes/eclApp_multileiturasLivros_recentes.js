
class eclApp_multileiturasLivros_recentes extends eclApp {
    static name = '-recentes';
    static map = ['multileiturasLivro'];
    static content = 'multileiturasLivros_recentes_main';

    static dispatch() {
page.components.content = 'multileiturasLivros_recentes_main';
    }
}
