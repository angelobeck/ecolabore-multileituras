
class eclCom_multileiturasLivro_reader extends eclCom {
    name = '';
    content = '';
    errorMessage = false;
    marker = 0;
    paragraphs;

    connectedCallback() {
        this.track('content');
        this.track('errorMessage');
        this.track('marker');
    }

    refreshCallback() {
        this.name = page.application.parent.name;
        this.content = '';
        this.errorMessage = false;
        this.marker = this.retrieveMarker(this.name);

        io.request(false, 'main', page.application.path)
            .then((response, raw) => {
                this.content = response.content;
            })
            .catch(error => {
                let message = store.staticContent.open(error.message);
                if (message)
                    this.errorMessage = message;
            });
    }

    get _paragraphs_() {
        return this.content.split("\n");
    }

    get _currentParagraph_() {
        return this.marker ? "Marcador ajustado para o parágrafo " + this.marker : "O marcador não foi definido.";
    }

    get _markerHideMessage_() {
        return !!this.retrieveMarkers();
    }

    get _markerHideButton_() {
        return !!this.marker;
    }

    handleContextmenu(event) {
        event.preventDefault();
        event.stopPropagation();
        var paragraph = event.currentTarget;
        var parent = paragraph.parentElement;
        var index = 0;
        while (index < parent.children.length && parent.children[index] !== paragraph) {
            index++;
        }
        this.marker = index;
        this.storeMarker(this.name, this.marker);
    }

    handleKeydown() {
        if (event.altKey || event.ctrlKey || event.metaKey)
            return;
        if (event.key === "Enter")
            handleContextmenu(event);
    }

    actionGotoMarker() {
        if (this.paragraphs && this.paragraphs.children && this.paragraphs.children[this.marker]) {
            this.paragraphs.children[this.marker].setAttribute('tabindex', '0');
            this.paragraphs.children[this.marker].focus();
        }
    }

    storeMarker(name, index) {
        var markers = this.retrieveMarkers();
        markers[name] = {
            currentParagraph: index,
            updated: Date.now()
        };
        this.storeMarkers(markers);
    }

    retrieveMarker(name) {
        var markers = this.retrieveMarkers();
        if (markers[name] && markers[name].currentParagraph)
            return markers[name].currentParagraph;
        else
            return 0;
    }

    retrieveMarkers() {
        var serialized = localStorage.getItem('libraryBook_reader');
        if (!serialized)
            return {};

        return unserialize(serialized);
    }

    storeMarkers(markers) {
        localStorage.setItem('libraryBook_reader', serialize(markers));
    }

}
