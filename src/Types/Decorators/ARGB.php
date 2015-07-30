<?php

namespace MrColor\Types\Decorators;

use Illuminate\Contracts\Support\Jsonable;
use MrColor\Types\Hex;
use MrColor\Types\TypeInterface;

/**
 * Class ARGB
 * @package MrColor\Types\Decorators
 */
class ARGB implements TypeInterface, Jsonable
{
    /**
     * @var Hex
     */
    private $hex;

    /**
     * @param Hex $hex
     */
    public function __construct(Hex $hex)
    {
        $this->hex = $hex;
    }

    /**
     * @param int $alpha
     *
     * @return $this
     */
    public function alpha($alpha = 100)
    {
        // TODO: Implement alpha() method.
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }

    /**
     * Convert the type to a string
     * @return mixed
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /**
     * Maintain chain of responsibility with decorated class
     *
     * @param       $method
     * @param array $args
     *
     * @return mixed
     */
    public function __call($method, $args = [])
    {
        if ( $method === "argb" ) {
            return $this;
        }

        return call_user_func_array([$this->HSL, $method], $args);
    }
}
