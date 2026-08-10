<?php

class eclApp_multileiturasNotFound extends eclApp
{
    public static $name = '-not-found';
    public static $content = 'multileiturasNotFound_main';

    public static function constructorHelper(eclEngine_application $me): void
    {
        $me->ignoreSubfolders = true;
    }

}
