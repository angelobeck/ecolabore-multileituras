
class eclApp_multileiturasEstante extends eclApp {
    static name = 'estante';
    static map = ['multileiturasLogin', 'multileiturasPerfil'];
    static content = 'multileiturasEstante_main';

    static dispatch(page) {
        page.components.content = 'multileiturasEstante_main';
    }
}
