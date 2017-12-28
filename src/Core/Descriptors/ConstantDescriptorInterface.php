<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:33
 */

namespace ClassDescriptor\Core\Descriptors;


interface ConstantDescriptorInterface extends BaseDescriptorInterface
{
    public function getValue(): string;
}