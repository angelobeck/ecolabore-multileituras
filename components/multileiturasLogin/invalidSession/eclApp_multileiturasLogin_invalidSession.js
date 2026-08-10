
class eclApp_multileiturasLogin_invalidSession extends eclApp {

    static name = '-invalid-session';
    static map = [];
    static content = 'multileiturasLogin_invalidSession_main';

    static dispatch() {
        page.components.layout = 'multileiturasLogin_invalidSession_main';
    }

}
