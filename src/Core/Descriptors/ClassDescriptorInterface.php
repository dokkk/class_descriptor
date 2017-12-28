<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:13
 */

namespace ClassDescriptor\Core\Descriptors;


interface ClassDescriptorInterface extends StructureDescriptorInterface
{
    public function isAbstract(): bool;
    public function getParent(): ClassDescriptorInterface;
    public function hasParent(): bool;
    public function getInterfaces(): array;
    public function hasInterfaces(): bool;
    public function getConstants(): array;
    public function getProperties(): array;
    public function getTraits(): array;
}