
class eclCom_multileiturasLivros extends eclCom {
    children = '';
    filterKeywords;
    format = '';
    keywords = '';
    status = 'Escreva uma palavra no campo acima para pesquisar';

    connectedCallback() {
        this.track('children');
        this.track('status');

        var serialized = localStorage.getItem('multileiturasLivros_search');
        if (serialized) {
            let response = unserialize(serialized);
            if (response.keywords && response.children && response.time + 129600000 > Date.now()) {
                this.children = response.children;
                this.keywords = response.keywords;
                this.format = response.format || '';
                this.status = 'Exibindo resultados para ' + this.keywords;

                let serialized = serialize({
                    keywords: this.keywords,
                    format: this.format,
                    children: this.children,
                    time: Date.now()
                });
                localStorage.setItem('multileiturasLivros_search', serialized);
            }
        }
    }

    handleButtonClick() {
        this.status = 'Pesquisando...';
        this.children = [];
        this.keywords = this.filterKeywords.value;
        if (this.keywords.length < 3) {
            this.status = 'O texto a pesquisar é muito curto, escreva uma palavra com pelo menos 3 letras.';
            return;
        }

        io.request({ keywords: this.keywords, format: this.format })
            .then((response) => {
                if (!Array.isArray(response.children) || response.children.length === 0) {
                    this.status = 'Não encontrei nenhum livro. Você poderia fornecer uma palavra diferente?';
                    return;
                }
                var length = response.children.length;
                if (length === 1)
                    this.status = 'Encontrei 1 livro.';
                else if (length < 100)
                    this.status = 'Encontrei ' + length + ' livros.';
                else
                    this.status = 'Encontrei muitos livros. Vou listar os 100 primeiros que eu encontrei, mas sujiro que escolha uma palavra mais específica.';
                this.children = response.children;
                let serialized = serialize({
                    keywords: this.keywords,
                    children: this.children,
                    format: this.format,
                    time: Date.now()
                });
                localStorage.setItem('multileiturasLivros_search', serialized);
            });
    }

    handleButtonKeydown(event) {
        if (event.altKey || event.ctrlKey || event.metaKey || event.shiftKey)
            return;
        if (event.key == ' ' || event.key == 'Enter')
            this.handleButtonClick();
    }

    handleInputKeydown(event) {
        if (event.altKey || event.ctrlKey || event.metaKey || event.shiftKey)
            return;
        if (event.key == 'Enter')
            this.handleButtonClick();
    }

    handleSelectChange(event) {
        this.format = event.currentTarget.value;
    }

    renderedCallback() {
        if (page.actions.keywords && page.actions.keywords.length > 1) {
            this.filterKeywords.value = page.actions.keywords[1].replace(/[+]/g, ' ');
            page.actions.keywords = [];
            this.handleClick();
        }
    }

    get _children_() {
        if (!Array.isArray(this.children))
            return [];

        var basePath = page.application.path;

        return this.children.map(child => {
            return {
                title: child.text.title,
                author: child.text.author,
                url: page.url([...basePath, child.name])
            }
        });
    }

    get _options_() {
        return [
            { value: '', label: 'Todos', selected: this.format == '' },
            { value: 'audio', label: 'Audiolivro', selected: this.format == 'audio' },
            { value: 'braille', label: 'Braille', selected: this.format == 'braille' },
            { value: 'digital', label: 'Livro digital', selected: this.format == 'digital' },
            { value: 'ink', label: 'Tinta', selected: this.format == 'ink' }
        ];
    }
}
