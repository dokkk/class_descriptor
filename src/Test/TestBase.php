<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 12:26
 */

namespace src\Test;


class TestBase extends \stdClass implements \Serializable, \Countable
{
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