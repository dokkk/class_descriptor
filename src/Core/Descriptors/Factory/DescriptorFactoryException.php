<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 27.12.17
 * Time: 02:18
 */

namespace ClassDescriptor\Core\Descriptors\Factory;


use Throwable;

class DescriptorFactoryException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}