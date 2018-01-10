<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 12:45
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface StructureDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface StructureDescriptorInterface extends BaseDescriptorInterface
{
    /**
     * @return string
     */
    public function getNameSpace(): string;

    /**
     * @return bool
     */
    public function hasMethods(): bool;

    /**
     * @return array
     */
    public function getMethods(): array;
}