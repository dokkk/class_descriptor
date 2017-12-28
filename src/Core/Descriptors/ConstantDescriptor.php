<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:34
 */

namespace ClassDescriptor\Core\Descriptors;


class ConstantDescriptor extends AbstractBaseDescriptor implements ConstantDescriptorInterface
{
    private $value;

    public function getValue(): string
    {
        return $this->value;
    }
}