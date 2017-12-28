<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:57
 */

namespace ClassDescriptor\Core\Descriptors;


class MethodDescriptor extends AbstractInternalDescriptor implements MethodDescriptorInterface
{
    private $isAbstract;
    private $isConstructor;
    private $parameters;

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

    public function getParameters(): array
    {
        return $this->parameters;
    }
}