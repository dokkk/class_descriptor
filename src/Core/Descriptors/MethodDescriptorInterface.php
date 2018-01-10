<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 01:10
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface MethodDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface MethodDescriptorInterface extends InternalDescriptorInterface
{
    /**
     * @return bool
     */
    public function isAbstract(): bool;

    /**
     * @return bool
     */
    public function isConstructor(): bool;

    /**
     * @return bool
     */
    public function hasParameters(): bool;

    /**
     * @return array
     */
    public function getParameters(): array;
}