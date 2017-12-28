<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:51
 */

namespace ClassDescriptor\Core\Descriptors;


abstract class AbstractInternalDescriptor extends AbstractBaseDescriptor implements InternalDescriptorInterface
{
    protected $visibility;
    protected $isStatic;

    public function getVisibility(): string
    {
        return $this->visibility;
    }

    public function isStatic(): bool
    {
        return $this->isStatic;
    }
}