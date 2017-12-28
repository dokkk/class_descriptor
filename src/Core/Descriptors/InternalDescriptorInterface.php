<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:27
 */

namespace ClassDescriptor\Core\Descriptors;


interface InternalDescriptorInterface extends BaseDescriptorInterface
{
    public function getVisibility(): string;
    public function isStatic(): bool;
    public function isFinal(): bool;
}