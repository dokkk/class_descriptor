<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 12:47
 */

namespace ClassDescriptor\Core\Descriptors;


abstract class AbstractStructureDescriptor extends AbstractBaseDescriptor implements StructureDescriptorInterface
{
    protected $nameSpace;
    protected $methods;

    public function __construct(string $name, string $nameSpace, array $methods)
    {
        parent::__construct($name);
        $this->nameSpace = $nameSpace;
        $this->methods = $methods;
    }

    public function getNameSpace(): string
    {
        return $this->nameSpace;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function isEqual(BaseDescriptorInterface $baseDescriptor): bool
    {
        return(
            parent::isEqual($baseDescriptor)  &&
            $this->getNameSpace() === $baseDescriptor->getNameSpace()
        );
    }
}