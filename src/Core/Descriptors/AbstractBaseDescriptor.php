<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 18:48
 */

namespace ClassDescriptor\Core\Descriptors;


use ReflectionClass;

/**
 * Class AbstractBaseDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
abstract class AbstractBaseDescriptor implements BaseDescriptorInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var ReflectionClass
     */
    protected $reflector;

    /**
     * AbstractBaseDescriptor constructor.
     * @param string $name
     * @param ReflectionClass $reflector
     */
    public function __construct(string $name, ReflectionClass $reflector)
    {
        $this->name = $name;
        $this->reflector = $reflector;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param BaseDescriptorInterface $baseDescriptor
     * @return bool
     */
    public function isEqualTo(BaseDescriptorInterface $baseDescriptor): bool
    {
        return(
            //check strictly instanceof -> is_a ?
            $this instanceof $baseDescriptor &&
            $this->getName() === $baseDescriptor->getName()
        );
    }
}