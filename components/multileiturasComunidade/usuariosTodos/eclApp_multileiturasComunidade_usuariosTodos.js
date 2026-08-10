
class eclApp_multileiturasComunidade_usuariosTodos extends eclApp {
    static name = '-todos';
    static map = ['multileiturasComunidade_perfil'];
    static content = 'multileiturasComunidade_usuariosTodos_main';

    static dispatch() {
page.components.list = 'multileiturasComunidade_usuariosTodos_main';
    }
}
