<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 18:18
 */

namespace ClassDescriptor\Core\Descriptors;


interface ParameterDescriptorInterface extends BaseDescriptorInterface
{
    public function getType(): string;
    public function isClass(): bool;
    public function hasDefaultValue(): bool;
    public function getDefaultValue(): string;
}