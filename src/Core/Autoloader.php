<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 02:21
 */

namespace ClassDescriptor\Core;


class Autoloader
{
    private static $classMap;

    public static function register()
    {
        self::$classMap = require __DIR__ . '/autoload_classmap.php';

        spl_autoload_register(function ($class_name) {
            $file = self::$classMap[$class_name];
            if($file && file_exists($file))
            {
                require($file);
            }
        });
    }
}