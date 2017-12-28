<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 12:45
 */

namespace ClassDescriptor\Core\Descriptors;


interface StructureDescriptorInterface extends BaseDescriptorInterface
{
    public function getNameSpace(): string;
    public function getMethods(): array;
}