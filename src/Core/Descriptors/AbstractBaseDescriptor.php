<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 18:48
 */

namespace ClassDescriptor\Core\Descriptors;


abstract class AbstractBaseDescriptor implements BaseDescriptorInterface
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isEqual(BaseDescriptorInterface $baseDescriptor): bool
    {
        return(
            //check strictly instanceof -> is_a ?
            $this instanceof $baseDescriptor &&
            $this->getName() === $baseDescriptor->getName()
        );
    }
}