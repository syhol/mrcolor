<?php

namespace MrColor\Types\Decorators;

use MrColor\Types\Contracts\AddsAlpha;
use MrColor\Types\Contracts\Stringable;
use MrColor\Types\HSL;

/**
 * Class HSLA
 * @package MrColor\Types\Decorators
 */
class HSLA implements Stringable, AddsAlpha
{
    /**
     * @var HSL
     */
    private $type;

    /**
     * @param HSL $HSL
     */
    public function __construct(HSL $HSL)
    {
        $this->type = $HSL;
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
        $values = $this->type->getValues();

        $values[] = $this->type->getAttribute('alpha');

        return json_encode(['hsla' => $values, 'css' => $this->__toString()], $options);
    }

    /**
     * Convert the type to a string
     * @return mixed
     */
    public function __toString()
    {
        list($hue, $saturation, $lightness) = $this->type->getValues();

        return "hsla({$hue}, {$saturation}%, {$lightness}%, {$this->type->getAttribute('alpha')})";
    }

    /**
     * @param float $alpha
     *
     * @return $this
     */
    public function setAlpha($alpha = 1.0)
    {
        $this->type->setAlpha($alpha);

        return $this;
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

        return call_user_func_array([$this->type, $method], $args);
    }
}
