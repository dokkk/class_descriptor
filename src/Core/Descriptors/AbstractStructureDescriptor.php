<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 12:47
 */

namespace ClassDescriptor\Core\Descriptors;


use ReflectionClass;

/**
 * Class AbstractStructureDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
abstract class AbstractStructureDescriptor extends AbstractBaseDescriptor implements StructureDescriptorInterface
{
    /**
     * @var string
     */
    protected $nameSpace;

    /**
     * @var null
     */
    protected $methods;

    /**
     * AbstractStructureDescriptor constructor.
     * @param string $name
     * @param string $nameSpace
     * @param ReflectionClass $reflector
     */
    public function __construct(string $name, string $nameSpace, ReflectionClass $reflector)
    {
        parent::__construct($name, $reflector);
        $this->nameSpace = $nameSpace;
        $this->methods = null;
    }

    /**
     * @return string
     */
    public function getNameSpace(): string
    {
        return $this->nameSpace;
    }

    /**
     * @return bool
     */
    public function hasMethods(): bool
    {
        return count($this->getMethods() > 0);
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        if($this->methods === null){
            $this->methods = $this->buildMethodsDescriptors();
        }
        return $this->methods;
    }

    /**
     * @param BaseDescriptorInterface $baseDescriptor
     * @return bool
     */
    public function isEqualTo(BaseDescriptorInterface $baseDescriptor): bool
    {
        return(
            parent::isEqualTo($baseDescriptor)  &&
            $this->getNameSpace() === $baseDescriptor->getNameSpace()
        );
    }

    /**
     * @return array
     */
    private function buildMethodsDescriptors()
    {
        $methods = [];
        $reflectionMethods = $this->reflector->getMethods();

        foreach ($reflectionMethods as $reflectionMethod)
        {
            $visibility = AbstractInternalDescriptor::PRIVATE;
            if ($reflectionMethod->isProtected()) {
                $visibility = AbstractInternalDescriptor::PROTECTED;
            }
            elseif ($reflectionMethod->isPublic()) {
                $visibility = AbstractInternalDescriptor::PUBLIC;
            }

            $methods[] = new MethodDescriptor(
                $reflectionMethod->getName(),
                $visibility,
                $reflectionMethod->isStatic(),
                $reflectionMethod->isFinal(),
                $reflectionMethod->isAbstract(),
                $reflectionMethod->isConstructor(),
                $this->buildParametersDescriptors($reflectionMethod->getParameters())
            );
        }
        return $methods;
    }

    /**
     * @param array $reflectionParameters
     * @return array
     */
    private function buildParametersDescriptors(array $reflectionParameters)
    {
        $parameters = [];
        foreach ($reflectionParameters as $reflectionParameter)
        {
            $defaultValue = null;
            if($reflectionParameter->isDefaultValueAvailable()){
                $defaultValue = $reflectionParameter->getDefaultValue();
            }

            $type = null;
            if($reflectionParameter->hasType()){
                $type = $reflectionParameter->getType()->__toString();
            }

            $parameters[] = new ParameterDescriptor(
                $reflectionParameter->getName(),
                $type,
                $defaultValue
            );
        }

        return $parameters;
    }
}