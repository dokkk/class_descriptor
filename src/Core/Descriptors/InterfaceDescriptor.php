<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:09
 */

namespace ClassDescriptor\Core\Descriptors;


use ReflectionClass;

/**
 * Class InterfaceDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
class InterfaceDescriptor extends AbstractStructureDescriptor implements InterfaceDescriptorInterface
{
    /**
     * @var array
     */
    private $parents;

    /**
     * InterfaceDescriptor constructor.
     * @param string $name
     * @param string $nameSpace
     * @param ReflectionClass $reflector
     */
    public function __construct(string $name, string $nameSpace, ReflectionClass $reflector)
    {
        parent::__construct($name, $nameSpace, $reflector);
        $this->parents = null;
    }

    /**
     * @return bool
     */
    public function hasParents(): bool
    {
        return count($this->getParents()) > 0;
    }

    /**
     * @return array
     */
    public function getParents(): array
    {
        if($this->parents === null){
            $parents = [];
            while ($parent = $this->reflector->getParentClass()) {
                if($parents !== false && $parents !== "stdClass"){
                    $parents[] = $parent;
                }
            }
            $this->parents = $parents;
        }
        return $this->parents;
    }
}