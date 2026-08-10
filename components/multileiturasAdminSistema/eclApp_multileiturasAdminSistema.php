<?php

class eclApp_multileiturasAdminSistema extends eclApp
{
    public static $name = 'sistema';
    public static $map = ['multileiturasAdminSistema_request', 'multileiturasAdminSistema_php', 'multileiturasAdminSistema_export', 'multileiturasAdminLivros_inserirDados'];
    public static $content = 'multileiturasAdminSistema_main';
    public static $access = 4;
}
