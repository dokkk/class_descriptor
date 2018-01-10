<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:33
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Interface ConstantDescriptorInterface
 * @package ClassDescriptor\Core\Descriptors
 */
interface ConstantDescriptorInterface extends BaseDescriptorInterface
{
    /**
     * @return string
     */
    public function getValue(): string;
}