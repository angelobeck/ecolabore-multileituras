
class eclApp_multileiturasLivro extends eclApp {

    static name = '-default';
    static map = ['multileiturasLivro_audiobook', 'multileiturasLivro_download', 'multileiturasLivro_reader'];
    static content = 'multileiturasLivro_main';

    static dispatch() {
        page.components.content = 'multileiturasLivro_main';
    }

}
