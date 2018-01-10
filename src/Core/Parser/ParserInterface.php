<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:23
 */

namespace ClassDescriptor\Core\Parser;


/**
 * Interface ParserInterface
 * @package ClassDescriptor\Core\Parser
 */
interface ParserInterface
{
    /**
     * @return bool
     */
    public function isFile(): bool;

    /**
     * @param int $level
     * @return mixed
     */
    public function run(int $level);
}