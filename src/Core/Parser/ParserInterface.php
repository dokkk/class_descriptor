<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:23
 */

namespace ClassDescriptor\Core\Parser;


interface ParserInterface
{
    const ONLY_SELF = 0;
    const SAME_LEVEL = 1;
    const UPPER_LEVEL = 2;
    const ALL = 3;

    public function isFile(): bool;
    public function run(int $level);
}