
class eclApp_multileiturasContent extends eclApp {

    static isChild(parent, name) {
        var data = store.load('multileituras_content').open(name);
        return !!data;
    }

    static childrenNames(parent) {
        return [];
    }

    static constructorHelper(me) {
        me.data = store.load('multileituras_content').open(me.name);
    }

}
