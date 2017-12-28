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
use ClassDescriptor\Core\Descriptors\InterfaceDescriptor;
use ClassDescriptor\Core\Descriptors\MethodDescriptor;
use ClassDescriptor\Core\Descriptors\ParameterDescriptor;
use ClassDescriptor\Core\Descriptors\TraitDescriptor;
use ReflectionClass;
use ReflectionMethod;

class DescriptorFactory implements DescriptorFactoryInterface
{
    public static function create(int $type, ReflectionClass $reflectionClass): BaseDescriptorInterface
    {
        $baseDescriptorInterface = null;
        if(in_array($type, self::TYPES, true))
        {
            $name = $reflectionClass->getShortName();
            $nameSpace = $reflectionClass->getNamespaceName();
            $methods = self::buildMethodsDescriptors($reflectionClass->getMethods());
            //$parent = self::buildParentClassDecriptor($reflectionClass->getParentClass());
            switch ($type)
            {
                case self::INTERFACE_DESCRIPTOR:

                    $baseDescriptorInterface = new InterfaceDescriptor($name, $nameSpace, $methods, $parent);
                    break;
                case self::CLASS_DESCRIPTOR:
                    $isAbstract = $reflectionClass->isAbstract();

                    $interfaces = $reflectionClass->getInterfaces();
                    if($interfaces == null) {
                        $interfaces = [];
                    }

                    $constants = $reflectionClass->getConstants();
                    if($constants == null) {
                        $constants = [];
                    }

                    $properties = $reflectionClass->getProperties();
                    if($properties == null) {
                        $properties = [];
                    }

                    $traits = $reflectionClass->getTraits();
                    if($traits == null) {
                        $traits = [];
                    }

                    $baseDescriptorInterface = new ClassDescriptor($name, $nameSpace, $methods, $isAbstract, $parent, $interfaces, $constants, $properties, $traits);
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

    private static function buildMethodsDescriptors(array $reflectionMethods)
    {
        $methods = [];
        /**
         * var ReflectionMethod $reflectionMethod
         */
        foreach ($reflectionMethods as $reflectionMethod)
        {
            //var_dump($reflectionMethod->getParameters());

            $visibility = AbstractInternalDescriptor::PRIVATE;
            if ($reflectionMethod->isProtected()) {
                $visibility = AbstractInternalDescriptor::PROTECTED;
            }
            elseif ($reflectionMethod->isPublic()) {
                $visibility = AbstractInternalDescriptor::PUBLIC;
            }

            $methods[] = new MethodDescriptor(
                $reflectionMethod->getName(),
                $visibility,
                $reflectionMethod->isStatic(),
                $reflectionMethod->isFinal(),
                $reflectionMethod->isAbstract(),
                $reflectionMethod->isConstructor(),
                self::buildParametersDescriptors($reflectionMethod->getParameters())
            );
        }
        return $methods;
    }

    private static function buildParametersDescriptors(array $reflectionParameters)
    {
        $parameters = [];
        foreach ($reflectionParameters as $reflectionParameter)
        {
            $defaultValue = null;
            if($reflectionParameter->isDefaultValueAvailable()){
                $defaultValue = $reflectionParameter->getDefaultValue();
            }

            $type = null;
            if($reflectionParameter->hasType()){
                $type = $reflectionParameter->getType()->__toString();
            }

            var_dump($reflectionParameter);
            $parameters[] = new ParameterDescriptor(
                $reflectionParameter->getName(),
                $type,
                $defaultValue
            );
        }

        return $parameters;
    }

    private static function buildParentClassDecriptor(ReflectionClass $parent)
    {
        if($parent->getParentClass() === false){
            return null;
        }

        return self::create(self::CLASS_DESCRIPTOR, $parent);
    }
}