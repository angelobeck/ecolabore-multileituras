
class eclCom_multileiturasCadastro_filterIdentifier extends eclCom {
    control;
    formulary;
    value = '';

    connectedCallback() {
        this.api('formulary');
        this.api('control');
    }

    refreshCallback() {
        if (!this.formulary)
            return;

        this.value = this.formulary.getField('identifier');

        if (!this.value || this.value === '') {
            this.value = eclIo_convert.slug(this.formulary.getField('text.title.pt.value'));
            this.formulary.setField('identifier', this.value);
        }
    }

    disconnectedCallback() {
        if (!this.formulary)
            return;

        this.formulary.unsubscribe(this);
    }

    handleChange(event) {
        if (!this.formulary)
            return;

        this.formulary.setField('identifier', event.detail.value);
    }

}
