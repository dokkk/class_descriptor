<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:13
 */

namespace ClassDescriptor\Core\Descriptors;

class ClassDescriptor extends AbstractStructureDescriptor implements ClassDescriptorInterface
{
    private $parent;
    private $interfaces;
    private $constants;
    private $properties;
    private $traits;
    private $isAbstract;

    public function __construct(string $name, string $nameSpace, array $methods, bool $isAbstract, ClassDescriptorInterface $parent = null, array $interfaces = [], array $constants = [], array $properties = [], array $traits = [])
    {
        parent::__construct($name, $nameSpace, $methods);
        $this->isAbstract = $isAbstract;
        $this->parent = $parent;
        $this->implements = $interfaces;
        $this->constants = $constants;
        $this->properties = $properties;
        $this->traits = $traits;
    }

    /**
     * @return bool
     */
    public function isAbstract(): bool
    {
        return $this->isAbstract;
    }

    /**
     * @return ClassDescriptorInterface
     */
    public function getParent(): ClassDescriptorInterface
    {
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function hasParent(): bool
    {
        return $this->getParent() !== null;
    }

    /**
     * @return array
     */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }

    /**
     * @return bool
     */
    public function hasInterfaces(): bool
    {
        return $this->getInterfaces() !== null && count($this->getInterfaces() > 0);
    }

    /**
     * @return array
     */
    public function getConstants(): array
    {
        return $this->constants;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @return array
     */
    public function getTraits(): array
    {
        return $this->traits;
    }
}