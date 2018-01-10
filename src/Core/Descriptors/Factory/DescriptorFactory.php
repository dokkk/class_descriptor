<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 27.12.17
 * Time: 02:10
 */

namespace ClassDescriptor\Core\Descriptors\Factory;


use ClassDescriptor\Core\Descriptors\AbstractInternalDescriptor;
use ClassDescriptor\Core\Descriptors\BaseDescriptorInterface;
use ClassDescriptor\Core\Descriptors\ClassDescriptor;
use ClassDescriptor\Core\Descriptors\ConstantDescriptor;
use ClassDescriptor\Core\Descriptors\InterfaceDescriptor;
use ClassDescriptor\Core\Descriptors\MethodDescriptor;
use ClassDescriptor\Core\Descriptors\ParameterDescriptor;
use ClassDescriptor\Core\Descriptors\PropertyDescriptor;
use ClassDescriptor\Core\Descriptors\TraitDescriptor;
use ClassDescriptor\Core\Utils\Util;
use ReflectionClass;

/**
 * Class DescriptorFactory
 * @package ClassDescriptor\Core\Descriptors\Factory
 */
class DescriptorFactory implements DescriptorFactoryInterface
{
    /**
     * @const int
     */
    const INTERFACE_DESCRIPTOR = 0;

    /**
     * @const int
     */
    const CLASS_DESCRIPTOR = 1;

    /**
     * @const int
     */
    const TRAIT_DESCRIPTOR = 2;

    /**
     * @const array
     */
    const TYPES = [self::INTERFACE_DESCRIPTOR, self::CLASS_DESCRIPTOR, self::TRAIT_DESCRIPTOR];

    /**
     * @param int $type
     * @param ReflectionClass $reflector
     * @return BaseDescriptorInterface
     * @throws DescriptorFactoryException
     */
    public static function create(int $type, ReflectionClass $reflector): BaseDescriptorInterface
    {
        $baseDescriptorInterface = null;
        if(in_array($type, self::TYPES, true))
        {
            $name = $reflector->getShortName();
            echo "name::::: ".$name, PHP_EOL;
            $nameSpace = $reflector->getNamespaceName();

            switch ($type)
            {
                case self::INTERFACE_DESCRIPTOR:

                    $baseDescriptorInterface = new InterfaceDescriptor($name, $nameSpace, $reflector);
                    break;
                case self::CLASS_DESCRIPTOR:

                    $baseDescriptorInterface = new ClassDescriptor($name, $nameSpace, $reflector);
                    break;
                case self::TRAIT_DESCRIPTOR:
                    $baseDescriptorInterface = new TraitDescriptor($name);
                    break;
            }
        }
        else
        {
            throw new DescriptorFactoryException("Type must be one of ".implode(",", self::TYPES));
        }

        return $baseDescriptorInterface;
    }
}