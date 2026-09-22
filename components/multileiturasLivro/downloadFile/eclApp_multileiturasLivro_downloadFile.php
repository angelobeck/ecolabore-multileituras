<?php

class eclApp_multileiturasLivro_downloadFile extends eclApp
{
    public static $name = '-default';
    public static $access = 1;

    public static function view_main(eclEngine_page $page): void
    {
        $folder = $page->application->parent->parent->name;
        $file = $page->application->name;
        $location = PATH_ROOT . 'livros/' . $folder . '/' . $file;

        if (is_file($location)) {
            eclIo_sendFile::send($location, []);
            exit();
        }
    }

}
