<?php

class eclApp_multileiturasAdmin extends eclApp
{
    static $name = 'admin';
    static $map = ['multileiturasAdminAvisos', 'multileiturasAdminUsuarios', 'multileiturasAdminLivros', 'multileiturasAdminContent', 'multileiturasAdminSistema'];
    static $content = 'multileiturasAdmin_main';
    static $access = 2;
}
