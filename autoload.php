<?php
/**
 * Class Autoloader
 * Autoloader des classes avec namespace correspondant aux répertoires
 */
class Autoloader
{
    /**
     * Autoloader
     * @param string $className
     */
    public static function autoload(string $className):void
    {
        $class = str_replace(__NAMESPACE__,DIRECTORY_SEPARATOR,$className);
        if(file_exists(APP_DIRECTORY . DIRECTORY_SEPARATOR . $class . '.php')){
            require APP_DIRECTORY . DIRECTORY_SEPARATOR . $class . '.php';
        }
    }

    /**
     * Enregistrement de l'autoloader
     */
    public static function register():void
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}

Autoloader::register();