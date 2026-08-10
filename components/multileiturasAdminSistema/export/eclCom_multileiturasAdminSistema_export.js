
class eclCom_multileiturasAdminSistema_export extends eclCom {
    response = '';
    fileName;
    
    connectedCallback() {
        this.track('response');
    }

    handleClick() {
        var data = { fileName: 'multileituras' };
        if (this.fileName.value !== '')
            data.fileName = this.fileName.value;

        io.request(data)
            .then(received => {
                this.response = serialize(received, true);
            });
    }

}