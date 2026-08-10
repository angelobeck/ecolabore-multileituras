
class eclApp_multileiturasPerfil extends eclApp {
    static name = 'perfil';
    static map = ['multileiturasPerfil_public', 'multileiturasPerfil_personal', 'multileiturasPerfil_password', 'multileiturasPerfil_remover'];
    static content = 'multileiturasPerfil_main';
    static access = 1;

    static dispatch(page) {
        page.components.content = 'multileiturasPerfil_main';
    }
}
