<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 21:46
 */

namespace ClassDescriptor\Core\Parser;


use Throwable;

/**
 * Class ParserException
 * @package ClassDescriptor\Core\Parser
 */
class ParserException extends \Exception
{
    /**
     * ParserException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}