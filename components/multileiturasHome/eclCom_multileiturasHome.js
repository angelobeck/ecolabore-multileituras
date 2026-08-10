
class eclCom_multileiturasHome extends eclCom {
    url;
    sections = [];
    recents = [];
    mensageria = {};

    connectedCallback() {
        this.track('sections');
        this.track('mensageria');
        this.url = page.url([page.domain.name, 'livros', '-dominio-publico']);

        io.request()
            .then(response => {
                this.recents = response.recents;
                this.mensageria = response.mensageria;
                localStorage.setItem('multileituras_content', serialize(response.children));
                var multileituras_content = store.load('multileituras_content');
                this.sections = multileituras_content.children(0);
            });
    }

    get _sections_() {
        return this.sections.map(section => {
            return {
                title: section.text.title,
                url: page.url([page.domain.name, section.name])
            };
        });
    }

    get _recents_() {
            var recents = this.recents.map(book => {
            return {
                title: book.text.title,
                author: book.text.author,
                url: page.url([page.domain.name, 'livros',  book.name])
            };
        });

        recents.push({
            title: 'Ver mais títulos adicionados recentemente',
            url: page.url([page.domain.name, 'livros',  '-recentes'])
        });
        return recents;
    }

}
