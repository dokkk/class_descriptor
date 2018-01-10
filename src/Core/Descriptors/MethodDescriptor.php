<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:57
 */

namespace ClassDescriptor\Core\Descriptors;


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
     * @param int $visibility
     * @param bool $isStatic
     * @param bool $isFinal
     * @param bool $isAbstract
     * @param bool $isConstructor
     * @param array $parameters
     */
    public function __construct(string $name, int $visibility, bool $isStatic, bool $isFinal, bool $isAbstract, bool $isConstructor, array $parameters = [])
    {
        parent::__construct($name, $visibility, $isStatic, $isFinal);
        $this->isAbstract = $isAbstract;
        $this->isConstructor = $isConstructor;
        $this->parameters = $parameters;
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
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}