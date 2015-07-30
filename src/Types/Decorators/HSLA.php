<?php

namespace MrColor\Types\Decorators;

use Illuminate\Contracts\Support\Jsonable;
use MrColor\Types\HSL;
use MrColor\Types\TypeInterface;

/**
 * Class HSLA
 * @package MrColor\Types\Decorators
 */
class HSLA implements TypeInterface, Jsonable
{
    /**
     * @var HSL
     */
    private $HSL;

    /**
     * @param HSL $HSL
     */
    public function __construct(HSL $HSL)
    {
        // TODO: write logic here
        $this->HSL = $HSL;
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
     * @param int $alpha
     *
     * @return \MrColor\Types\HSLA
     */
    public function alpha($alpha = 100)
    {
        // TODO: Implement alpha() method.
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
        if ( $method === "hsla" ) {
            return $this;
        }

        return call_user_func_array([$this->HSL, $method], $args);
    }
}
