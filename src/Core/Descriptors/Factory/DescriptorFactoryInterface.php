<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 27.12.17
 * Time: 02:06
 */

namespace ClassDescriptor\Core\Descriptors\Factory;

use ClassDescriptor\Core\Descriptors\BaseDescriptorInterface;
use ReflectionClass;

/**
 * Interface DescriptorFactoryInterface
 * @package ClassDescriptor\Core\Descriptors\Factory
 */
interface DescriptorFactoryInterface
{
    /**
     * @param int $type
     * @param ReflectionClass $reflector
     * @return BaseDescriptorInterface
     */
    public static function create(int $type, ReflectionClass $reflector): BaseDescriptorInterface;
}