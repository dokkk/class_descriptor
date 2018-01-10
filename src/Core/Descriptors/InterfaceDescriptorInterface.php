<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:02
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface InterfaceDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface InterfaceDescriptorInterface extends StructureDescriptorInterface
{
    /**
     * @return bool
     */
    public function hasParents(): bool;

    /**
     * @return array
     */
    public function getParents(): array;
}