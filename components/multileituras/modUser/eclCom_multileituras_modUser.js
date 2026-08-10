
class eclCom_multileituras_modUser extends eclCom {
    login_url = '';
    subscribe_url = '';
    profile_url = '';
    logout_url = '';
    isConnected = false;
    continueReadingChecked = false;
    continueReadingData = false;

    connectedCallback() {
        this.track('isConnected');
    }

    refreshCallback() {
        if (page.session.user && page.session.user.name) {
            this.isConnected = true;
            this.profile_url = page.url([page.domain.name, 'estante', 'perfil']);
            this.logout_url = page.url(true, true, '_logout');
        } else {
            this.isConnected = false;
            this.login_url = page.url([page.domain.name, 'estante', '-login']);
            this.subscribe_url = page.url([page.domain.name, 'cadastrar']);
        }
    }

    handleLogout() {
        page.session = {};
        page.sessionRemove();
        root.reset();
        init();
    }

    get _continueReading_() {
        if (!this.continueReadingChecked) {
            this.continueReadingChecked = true;
            let serialized = localStorage.getItem('multileiturasLivro_audioConfiguration');
            if (serialized)
                this.continueReadingData = unserialize(serialized);
        }

        if (this.continueReadingData.name)
            return true;
        else
            return false;
    }

    get _continueReadingUrl_() {
        var name = this.continueReadingData.name;
        return page.url([page.domain.name, 'livros', name, 'audiobook'], true, '_autoplay');
    }

    get _continueReadingLabel_() {
        var title = this.continueReadingData.title || '';
        return "Continuar escutando " + title;
    }

}
