<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 18:19
 */

namespace ClassDescriptor\Core\Descriptors;


class ParameterDescriptor extends AbstractBaseDescriptor implements ParameterDescriptorInterface
{
    private $type;
    private $defaultValue;

    public function __construct(string $name, string $type = null, string $defaultValue = null)
    {
        parent::__construct($name);
        $this->type = $type;
        $this->defaultValue = $defaultValue;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isClass(): bool
    {
        return is_object($this->getType());
    }

    public function hasDefaultValue(): bool
    {
        //TO DO
        return false;
    }

    public function getDefaultValue(): string
    {
        //TO DO manage not existing default value with exception?
        return $this->defaultValue;
    }
}