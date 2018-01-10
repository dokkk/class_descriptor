<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:13
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface ClassDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface ClassDescriptorInterface extends StructureDescriptorInterface
{
    /**
     * @return bool
     */
    public function hasParent(): bool;

    /**
     * @return ClassDescriptorInterface
     */
    public function getParent(): ClassDescriptorInterface;

    /**
     * @return bool
     */
    public function isAbstract(): bool;

    /**
     * @return bool
     */
    public function hasInterfaces(): bool;

    /**
     * @return array
     */
    public function getInterfaces(): array;

    /**
     * @return bool
     */
    public function hasConstants(): bool;

    /**
     * @return array
     */
    public function getConstants(): array;

    /**
     * @return bool
     */
    public function hasProperties(): bool;

    /**
     * @return array
     */
    public function getProperties(): array;

    /**
     * @return bool
     */
    public function hasTraits(): bool;

    /**
     * @return array
     */
    public function getTraits(): array;
}