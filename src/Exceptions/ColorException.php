<?php namespace MrColor\Exceptions;

use Exception;

/**
 * Class ColorException
 * @package MrColor\Exceptions
 */
class ColorException extends Exception
{
    /**
     * ColorException constructor.
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}