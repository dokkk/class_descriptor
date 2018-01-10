<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 01.01.18
 * Time: 18:35
 */

namespace ClassDescriptor\Core\Utils;


interface UtilInterface
{
    public static function falseToNull($param);
    public static function falseOrNullToEmptyArray($param);
}