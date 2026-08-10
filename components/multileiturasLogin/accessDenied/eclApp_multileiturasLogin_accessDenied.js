
class eclApp_multileiturasLogin_accessDenied extends eclApp {

    static name = '-access-denied';
    static map = [];
    static content = 'multileiturasLogin_accessDenied_main';

    static dispatch() {
        page.components.layout = 'multileiturasLogin_accessDenied_main';
    }

}
