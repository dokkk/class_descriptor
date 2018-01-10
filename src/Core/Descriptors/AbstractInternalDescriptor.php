<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 00:51
 */

namespace ClassDescriptor\Core\Descriptors;

use Reflector;
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
     * @param ReflectionClass $reflector
     */
    public function __construct(string $name, Reflector $reflector)
    {
        parent::__construct($name, $reflector);

        $visibility = AbstractInternalDescriptor::PRIVATE;
        if ($reflector->isProtected()) {
            $visibility = AbstractInternalDescriptor::PROTECTED;
        }
        elseif ($reflector->isPublic()) {
            $visibility = AbstractInternalDescriptor::PUBLIC;
        }
        $this->visibility = $visibility;
        $this->isStatic = $reflector->isStatic();
        $this->isFinal = $reflector->isFinal();
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