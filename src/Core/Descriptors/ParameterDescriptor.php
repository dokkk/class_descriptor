<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 18:19
 */

namespace ClassDescriptor\Core\Descriptors;


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
     * @param string|null $type
     * @param string|null $defaultValue
     */
    public function __construct(string $name, string $type = null, string $defaultValue = null)
    {
        parent::__construct($name);
        $this->type = $type;
        $this->defaultValue = $defaultValue;
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
        return is_object($this->getType());
    }

    /**
     * @return bool
     */
    public function hasDefaultValue(): bool
    {
        //TO DO
        return false;
    }

    /**
     * @return string
     */
    public function getDefaultValue(): string
    {
        //TO DO manage not existing default value with exception?
        return $this->defaultValue;
    }
}