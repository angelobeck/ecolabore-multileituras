
class eclApp_multileiturasLivros extends eclApp {
    static name = 'livros';
    static map = ['multileiturasLivros_recentes', 'multileiturasLivros_generos', 'multileiturasLivros_autores', 'multileiturasLivros_titulos', 'multileiturasLivros_audiobooks', 'multileiturasLivros_narradores', 'multileiturasLivros_dominioPublico', 'multileiturasLivros_series', 'multileiturasLivro'];
    static content = 'multileiturasLivros_main';

    static dispatch() {
        page.components.content = 'multileiturasLivros_main';
    }
}