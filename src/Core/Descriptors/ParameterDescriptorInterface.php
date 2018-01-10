<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 28.12.17
 * Time: 18:18
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface ParameterDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface ParameterDescriptorInterface extends BaseDescriptorInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return bool
     */
    public function isClass(): bool;

    /**
     * @return bool
     */
    public function hasDefaultValue(): bool;

    /**
     * @return string
     */
    //TO DO return string in next PHP version
    public function getDefaultValue();
}