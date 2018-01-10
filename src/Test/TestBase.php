<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 12:26
 */

namespace src\Test;


use ClassDescriptor\Core\Parser\ParserException;

class TestBase implements \Serializable, \Countable
{
    const PUH = "1";
    const BAH = 5;

    private $first = 1;
    protected $second = "2";
    public $third = true;

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    public function go(int $pippo = 10)
    {
        return $pippo;
    }
}