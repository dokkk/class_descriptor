<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 01.01.18
 * Time: 18:37
 */

namespace ClassDescriptor\Core\Utils;


class Util implements UtilInterface
{
    public static function falseToNull($param)
    {
        if($param == false){
            return null;
        }

        return $param;
    }

    public static function falseOrNullToEmptyArray($param)
    {
        if($param == false || $param == null){
            return [];
        }

        return $param;
    }
}