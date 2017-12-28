<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 27.12.17
 * Time: 02:10
 */

namespace ClassDescriptor\Core\Descriptors\Factory;


use ClassDescriptor\Core\Descriptors\BaseDescriptorInterface;
use ClassDescriptor\Core\Descriptors\ClassDescriptor;
use ClassDescriptor\Core\Descriptors\InterfaceDescriptor;
use ClassDescriptor\Core\Descriptors\TraitDescriptor;
use ReflectionClass;

class DescriptorFactory implements DescriptorFactoryInterface
{
    public static function create(int $type, ReflectionClass $reflectionClass): BaseDescriptorInterface
    {
        $baseDescriptorInterface = null;
        if(in_array($type, self::TYPES, true))
        {
            $name = $reflectionClass->getShortName();
            $nameSpace = $reflectionClass->getNamespaceName();
            echo $nameSpace;
            switch ($type)
            {
                case self::INTERFACE_DESCRIPTOR:
                    $isAbstract = $reflectionClass->get;
                    $baseDescriptorInterface = new InterfaceDescriptor($name, $nameSpace);
                    break;
                case self::CLASS_DESCRIPTOR:
                    $baseDescriptorInterface = new ClassDescriptor($name, $nameSpace);
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