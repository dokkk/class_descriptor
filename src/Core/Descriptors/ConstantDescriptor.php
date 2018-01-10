<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:34
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Class ConstantDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
class ConstantDescriptor extends AbstractBaseDescriptor implements ConstantDescriptorInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * ConstantDescriptor constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        parent::__construct($name);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}