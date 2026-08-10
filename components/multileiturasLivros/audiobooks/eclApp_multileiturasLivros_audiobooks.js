
class eclApp_multileiturasLivros_audiobooks extends eclApp {
    static name = '-audiobooks';
    static map = ['multileiturasLivro'];
    static content = 'multileiturasLivros_audiobooks_main';

    static dispatch() {
page.components.content = 'multileiturasLivros_audiobooks_main';
    }
}
