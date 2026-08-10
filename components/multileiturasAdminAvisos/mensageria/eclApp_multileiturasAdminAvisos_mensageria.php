<?php

class eclApp_multileiturasAdminAvisos_mensageria extends eclApp
{
    public static $name = 'mensageria';
    public static $content = 'multileiturasAdminAvisos_mensageria_main';

    public static function dispatch(eclEngine_page $page): void
    {
        $page->endpoints->main = 'multileiturasAdminAvisos_mensageria_main';
    }

}
