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

interface DescriptorFactoryInterface
{
    const INTERFACE_DESCRIPTOR = 0;
    const CLASS_DESCRIPTOR = 1;
    const TRAIT_DESCRIPTOR = 2;
    const TYPES = [self::INTERFACE_DESCRIPTOR, self::CLASS_DESCRIPTOR, self::TRAIT_DESCRIPTOR];

    public static function create(int $type, ReflectionClass $reflectionClass): BaseDescriptorInterface;
}