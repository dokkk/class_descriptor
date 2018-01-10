<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:51
 */

namespace ClassDescriptor\Core\Descriptors;


/**
 * Class AbstractInternalDescriptor
 * @package ClassDescriptor\Core\Descriptors
 */
abstract class AbstractInternalDescriptor extends AbstractBaseDescriptor implements InternalDescriptorInterface
{
    /**
     * @const int
     */
    const PRIVATE = 0;

    /**
     * @const int
     */
    const PROTECTED = 1;

    /**
     * @const int
     */
    const PUBLIC = 2;

    /**
     * @const array
     */
    const VISIBILITIES = [self::PRIVATE, self::PROTECTED, self::PUBLIC];

    /**
     * @var int
     */
    protected $visibility;

    /**
     * @var bool
     */
    protected $isStatic;

    /**
     * @var bool
     */
    protected $isFinal;

    /**
     * AbstractInternalDescriptor constructor.
     * @param string $name
     * @param int $visibility
     * @param bool $isStatic
     * @param bool $isFinal
     */
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

    /**
     * @return int
     */
    public function getVisibility(): int
    {
        return $this->visibility;
    }

    /**
     * @return bool
     */
    public function isStatic(): bool
    {
        return $this->isStatic;
    }

    /**
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->isFinal;
    }
}