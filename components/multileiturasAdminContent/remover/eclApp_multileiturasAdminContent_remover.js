
class eclApp_multileiturasAdminContent_remover extends eclApp {
    static name = '-remover';
    static content = 'multileiturasAdminContent_remover_main';

    static dispatch() {
        page.components.content = 'multileiturasAdminContent_remover_main';
    }

}
