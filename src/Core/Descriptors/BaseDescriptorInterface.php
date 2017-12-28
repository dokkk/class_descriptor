<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 18:45
 */

namespace ClassDescriptor\Core\Descriptors;


interface BaseDescriptorInterface
{
    public function getName(): string;
    public function isEqual(BaseDescriptorInterface $baseDescriptor): bool;
}