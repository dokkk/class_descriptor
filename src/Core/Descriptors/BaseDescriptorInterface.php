<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 18:45
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface BaseDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface BaseDescriptorInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param BaseDescriptorInterface $baseDescriptor
     * @return bool
     */
    public function isEqualTo(BaseDescriptorInterface $baseDescriptor): bool;
}