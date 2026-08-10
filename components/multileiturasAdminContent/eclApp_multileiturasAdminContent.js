
class eclApp_multileiturasAdminContent extends eclApp
{
    static name = 'content';
    static map = ['multileiturasAdminContent_cadastrar', 'multileiturasAdminContent_detalhes'];
    static content = 'multileiturasAdminContent_main';

       static dispatch() {
        page.components.content = 'multileiturasAdminContent_main';
    }

}
