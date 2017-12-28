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
    private $parameters;

    public function getParameters(): array
    {
        return $this->parameters;
    }
}