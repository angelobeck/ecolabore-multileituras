
class eclApp_multileiturasAdminLivros_generosTodos extends eclApp {

    static isChild(parent, name) {
        switch (name) {
            case '-autores':
            case '-generos':
            case '-narradores':
                return true;
        }
        return false;
    }

    static childrenNames(parent) {
        return ['-autores', '-generos', '-narradores'];
    }

    static constructorHelper(me) {
        me.map = ['multileiturasAdminLivros_generosDetalhes'];

        switch (me.name) {
            case '-autores':
                me.data = store.staticContent.open('multileiturasAdminLivros_generosTodos_autores');
                break;

            case '-generos':
                me.data = store.staticContent.open('multileiturasAdminLivros_generosTodos_main');
                break;

            case '-narradores':
                me.data = store.staticContent.open('multileiturasAdminLivros_generosTodos_narradores');
        }
    }

    static dispatch() {
        page.components.content = 'multileiturasAdminLivros_generosTodos_main';
    }
}
