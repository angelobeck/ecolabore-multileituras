
class eclApp_multileiturasLivros_autores extends eclApp {
    static name = '-autores';
    static map = ['multileiturasLivros_autoresDetalhes'];
    static content = 'multileiturasLivros_autores_main';

    static dispatch() {
page.components.content = 'multileiturasLivros_autores_main';
    }
}
