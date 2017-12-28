<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:09
 */

namespace ClassDescriptor\Core\Descriptors;


class InterfaceDescriptor extends AbstractStructureDescriptor implements InterfaceDescriptorInterface
{
    private $extends;

    public function __construct(string $name, string $nameSpace, array $methods, array $extends)
    {
        parent::__construct($name, $nameSpace, $methods);
        $this->extends = $extends;
    }

    public function getExtends(): array
    {
        return $this->extends;
    }
}