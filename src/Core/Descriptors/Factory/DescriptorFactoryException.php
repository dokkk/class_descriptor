<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 27.12.17
 * Time: 02:18
 */

namespace ClassDescriptor\Core\Descriptors\Factory;


use Throwable;

/**
 * Class DescriptorFactoryException
 * @package ClassDescriptor\Core\Descriptors\Factory
 */
class DescriptorFactoryException extends \Exception
{
    /**
     * DescriptorFactoryException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}