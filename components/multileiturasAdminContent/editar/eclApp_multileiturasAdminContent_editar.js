
class eclApp_multileiturasAdminContent_editar extends eclApp {
    static name = '-editar-pagina';
    static content = 'multileiturasAdminContent_editar_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminContent_editar_main';
    }

}
