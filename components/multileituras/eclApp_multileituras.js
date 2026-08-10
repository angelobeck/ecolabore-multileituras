
class eclApp_multileituras extends eclApp {
    static name = 'multileituras';
    static content = 'multileituras_main';

        static constructorHelper(me) {
        me.map =[...getMap('multileituras'), 'multileiturasHome', 'multileiturasLivros', 'multileiturasEstante', 'multileiturasComunidade', 'multileiturasAdmin', 'multileiturasCadastro', 'multileiturasLogin', 'multileiturasLogin_accessDenied', 'multileiturasLogin_invalidSession', 'multileiturasContent', 'multileiturasNotFound'];
    }

    static dispatch(page) {
        page.components.content = 'multileituras_modContent_main';
        page.components.dialog = 'multileituras_modDialog_main';
        page.components.layout = 'multileituras_modLayout_main';
        page.components.levelUp = 'multileituras_modLevelUp_main';
        page.components.list = 'multileituras_modList_main';
        page.components.nav = 'multileituras_modNav_main';
        page.components.title = 'multileituras_modTitle_main';
        page.components.user = 'multileituras_modUser_main';
        page.components.userContext = 'multileituras_modUserContext_main';
    }
}
