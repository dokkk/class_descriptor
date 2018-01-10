<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:27
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface InternalDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface InternalDescriptorInterface extends BaseDescriptorInterface
{
    /**
     * @return int
     */
    public function getVisibility(): int;

    /**
     * @return bool
     */
    public function isStatic(): bool;

    /**
     * @return bool
     */
    public function isFinal(): bool;
}