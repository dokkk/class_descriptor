<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 18:19
 */

namespace ClassDescriptor\Core\Descriptors;

use ReflectionParameter;
/**
 * Class ParameterDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
class ParameterDescriptor extends AbstractBaseDescriptor implements ParameterDescriptorInterface
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $defaultValue;

    /**
     * ParameterDescriptor constructor.
     * @param string $name
     * @param ReflectionParameter $reflector
     */
    public function __construct(string $name, ReflectionParameter $reflector)
    {
        parent::__construct($name, $reflector);

        $this->type = "";
        if($reflector->getClass() !== null){
            $this->type = $reflector->getClass()->getShortName();
        }
        elseif($reflector->hasType()){
            $this->type = $reflector->getType();
        }

        $this->defaultValue = null;
        if($reflector->isDefaultValueAvailable()){
            $this->defaultValue = var_export($reflector->getDefaultValue(), true);// === null ? "null" : $reflector->getDefaultValue();
        }
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isClass(): bool
    {
        return is_object($this->reflector->getClass());
    }

    /**
     * @return bool
     */
    public function hasDefaultValue(): bool
    {
        return $this->getDefaultValue() !== null;
    }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
}