
class eclApp_multileiturasPerfil_personal extends eclApp {
    static name = 'personal';
    static content = 'multileiturasPerfil_personal_main';

    static dispatch() {
        page.components.content = 'multileiturasPerfil_personal_main';
    }

}
