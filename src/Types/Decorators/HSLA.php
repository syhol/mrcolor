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
        $values = $this->HSL->getValues();

        $values[] = $this->HSL->getAttribute('alpha');

        return json_encode(['hsla' => $values, 'css' => $this->__toString()], $options);
    }

    /**
     * @param int $alpha
     *
     * @return \MrColor\Types\HSLA
     */
    public function alpha($alpha = 100)
    {
        $this->HSL->alpha($alpha);

        return $this;
    }

    /**
     * Convert the type to a string
     * @return mixed
     */
    public function __toString()
    {
        list($hue, $saturation, $lightness) = $this->HSL->getValues();

        return "hsla({$hue}, {$saturation}%, {$lightness}%, {$this->HSL->getAttribute('alpha')})";
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
