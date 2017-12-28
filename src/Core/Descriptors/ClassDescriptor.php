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
    private $extend;
    private $implements;
    private $constants;
    private $properties;
    private $traits;
    private $isAbstract;

    public function __construct(string $name, string $nameSpace, bool $isAbstract, array $methods, string $extend, array $implements, array $constants, array $properties, array $traits)
    {
        parent::__construct($name, $nameSpace, $methods);
        $this->isAbstract = $isAbstract;
        $this->extend = $extend;
        $this->implements = $implements;
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
     * @return string
     */
    public function getExtend(): string
    {
        return $this->extend;
    }

    /**
     * @return array
     */
    public function getImplements(): array
    {
        return $this->implements;
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