<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 01:10
 */

namespace ClassDescriptor\Core\Descriptors;


interface MethodDescriptorInterface extends InternalDescriptorInterface
{
    public function getParameters(): array;
}