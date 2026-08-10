
class eclCom_multileiturasAdminContent_detalhes extends eclCom {
    fields = false;

    connectedCallback() {
        this.track('fields');

        io.request()
            .then(response => {
                this.fields = response.page;
            });
    }

}
