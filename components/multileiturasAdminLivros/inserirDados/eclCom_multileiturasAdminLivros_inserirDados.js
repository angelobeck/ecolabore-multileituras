
class eclCom_multileiturasAdminLivros_inserirDados extends eclCom {
    response = '';
    raw = '';
    input;

    connectedCallback() {
        this.track('response');
        this.track('raw');
    }

    handleClick() {

        var data = false;
        if (this.input.value !== '')
            data = unserialize(this.input.value);

        io.request(data)
            .then((received, raw) => {
                this.raw = raw; // serialize(received, true);
            }).catch((error, raw) => {
                this.raw = raw;
            });
    }

}