
class eclApp_multileiturasLogin extends eclApp {

    static name = '-login';
    static map = [];
    static content = 'multileiturasLogin_main';

    static dispatch() {
        page.components.layout = 'multileiturasLogin_main';
    }

}
