
class eclApp_multileiturasLivros_titulos extends eclApp {
    static name = '-titulos';
    static map = ['multileiturasLivro'];
    static content = 'multileiturasLivros_titulos_main';

    static dispatch() {
page.components.content = 'multileiturasLivros_titulos_main';
    }
}
