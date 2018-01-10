<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:13
 */

namespace ClassDescriptor\Core\Descriptors;

use ReflectionClass;

/**
 * Class ClassDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
class ClassDescriptor extends AbstractStructureDescriptor implements ClassDescriptorInterface
{
    /**
     * @var ReflectionClass
     */
    private $parent;
    /**
     * @var array
     */
    private $interfaces;
    /**
     * @var array
     */
    private $constants;
    /**
     * @var array
     */
    private $properties;
    /**
     * @var array
     */
    private $traits;
    /**
     * @var bool
     */
    private $isAbstract;

    /**
     * ClassDescriptor constructor.
     * @param string $name
     * @param string $nameSpace
     * @param ReflectionClass $reflector
     */
    public function __construct(string $name, string $nameSpace, ReflectionClass $reflector)
    {
        parent::__construct($name, $nameSpace, $reflector);
        $this->parent = null;
        $this->isAbstract = $this->reflector->isAbstract();
        $this->interfaces = null;
        $this->constants = null;
        $this->properties = null;
        $this->traits = null;
    }

    /**
     * @return bool
     */
    public function hasParent(): bool
    {
        return $this->getParent() !== null;
    }

    /**
     * @return ClassDescriptorInterface
     */
    public function getParent(): ClassDescriptorInterface
    {
        if($this->parent === null){
            $parent = $this->reflector->getParentClass();
            if($parent !== false && $parent !== "stdClass"){
                $this->parent = $parent;
            }
        }
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function isAbstract(): bool
    {
        return $this->isAbstract;
    }

    /**
     * @return bool
     */
    public function hasInterfaces(): bool
    {
        return count($this->getInterfaces() > 0);
    }

    /**
     * @return array
     */
    public function getInterfaces(): array
    {
        if($this->interfaces == null){
            $this->interfaces = $this->buildInterfacesDescriptors();
        }
        return $this->interfaces;
    }

    /**
     * @return bool
     */
    public function hasConstants(): bool
    {
        return count($this->getConstants() > 0);
    }

    /**
     * @return array
     */
    public function getConstants(): array
    {
        if($this->constants === null){
            $this->constants == $this->buildConstantsDescriptors();
        }
        return $this->constants;
    }

    /**
     * @return bool
     */
    public function hasProperties(): bool
    {
        return count($this->getProperties() > 0);
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        if($this->properties === null){
            $this->properties == $this->buildPropertiesDescriptors();
        }
        return $this->properties;
    }

    /**
     * @return bool
     */
    public function hasTraits(): bool
    {
        return count($this->getTraits() > 0);
    }

    /**
     * @return array
     */
    public function getTraits(): array
    {
        if($this->traits === null) {
            $traits = $this->reflector->getTraits();
            if($traits === null || $traits === false) {
                $traits = [];
            }
            $this->traits = $traits;
        }
        return $this->traits;
    }


    /**
     * @return array
     */
    private function buildInterfacesDescriptors()
    {
        $interfaces = [];
        $reflectionInterfaces = $this->reflector->getInterfaces();
        foreach ($reflectionInterfaces as $reflectionInterface)
        {
            $interfaces[] = new InterfaceDescriptor(
                $reflectionInterface->getName(),
                $reflectionInterface->getNamespaceName(),
                $reflectionInterface->getMethods(),
                $reflectionInterface->getInterfaces()
            );
        }
        return $interfaces;
    }

    /**
     * @return array
     */
    private function buildConstantsDescriptors()
    {
        $constants = [];
        $reflectionConstants = $this->reflector->getConstants();

        //$reflectionConstants is a key/value array
        foreach ($reflectionConstants as $name => $value)
        {
            $constants[] = new ConstantDescriptor($name, $value);
        }
        return $constants;
    }

    /**
     * @return array
     */
    private function buildPropertiesDescriptors()
    {
        $properties = [];
        $reflectionProperties = $this->reflector->getProperties();
        var_dump($reflectionProperties);

        foreach ($reflectionProperties as $reflectionProperty)
        {
            $visibility = AbstractInternalDescriptor::PRIVATE;
            if ($reflectionProperty->isProtected()) {
                $visibility = AbstractInternalDescriptor::PROTECTED;
            }
            elseif ($reflectionProperty->isPublic()) {
                $visibility = AbstractInternalDescriptor::PUBLIC;
            }

            $properties[] = new PropertyDescriptor(
                $reflectionProperty->getName(),
                $visibility,
                $reflectionProperty->isStatic(),
                //TO DO : isFinal not present on properties, refactor AbstractInternalDescriptor?
                $reflectionProperty->isFinal()
            );
        }

        return $properties;
    }
}