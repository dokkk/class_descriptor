<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:57
 */

namespace ClassDescriptor\Core\Descriptors;

use ReflectionMethod;

/**
 * Class MethodDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
class MethodDescriptor extends AbstractInternalDescriptor implements MethodDescriptorInterface
{
    /**
     * @var bool
     */
    private $isAbstract;
    /**
     * @var bool
     */
    private $isConstructor;
    /**
     * @var array
     */
    private $parameters;

    /**
     * MethodDescriptor constructor.
     * @param string $name
     * @param ReflectionMethod $reflector
     */
    public function __construct(string $name, ReflectionMethod $reflector)
    {
        parent::__construct($name, $reflector);
        $this->isAbstract = $reflector->isAbstract();
        $this->isConstructor = $reflector->isConstructor();
        $this->parameters = null;
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
    public function isConstructor(): bool
    {
        return $this->isConstructor;
    }

    /**
     * @return bool
     */
    public function hasParameters(): bool
    {
        return count($this->getParameters() > 0);
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        if($this->parameters == null){
            $this->parameters = $this->buildParametersDescriptors();
        }
        return $this->parameters;
    }

    /**
     * @return array
     */
    private function buildParametersDescriptors()
    {
        $parameters = [];
        $reflectionParameters = $this->reflector->getParameters();
        foreach ($reflectionParameters as $reflectionParameter)
        {
            $parameters[] = new ParameterDescriptor($reflectionParameter->getName(), $reflectionParameter);
        }

        return $parameters;
    }
}