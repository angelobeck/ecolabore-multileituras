
class eclApp_multileiturasHome extends eclApp {
    static name = '-home';
    static content = 'multileiturasHome_main';

    static constructorHelper(me) {
        me.path = me.parent.path;
    }

    static view_main(page) {
        page.components.content = 'multileiturasHome_main';
    }

}
