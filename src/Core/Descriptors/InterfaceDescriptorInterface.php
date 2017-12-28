<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:02
 */

namespace ClassDescriptor\Core\Descriptors;


interface InterfaceDescriptorInterface extends StructureDescriptorInterface
{
    public function getExtends(): array;
}