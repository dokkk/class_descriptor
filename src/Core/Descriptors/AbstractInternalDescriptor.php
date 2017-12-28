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
    const PRIVATE = 0;
    const PROTECTED = 1;
    const PUBLIC = 2;
    const VISIBILITIES = [self::PRIVATE, self::PROTECTED, self::PUBLIC];

    protected $visibility;
    protected $isStatic;
    protected $isFinal;

    public function __construct(string $name, int $visibility, bool $isStatic, bool $isFinal)
    {
        if(in_array($visibility, self::VISIBILITIES)) {
            parent::__construct($name);
            $this->isStatic = $isStatic;
            $this->isFinal = $isFinal;
        }
        else {
            throw new DescriptorFactoryException("Visibility must be one of ".implode(",", self::VISIBILITIES));
        }

    }

    public function getVisibility(): string
    {
        return $this->visibility;
    }

    public function isStatic(): bool
    {
        return $this->isStatic;
    }

    public function isFinal(): bool
    {
        return $this->isFinal;
    }
}