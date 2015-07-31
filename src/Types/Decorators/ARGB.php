<?php

namespace MrColor\Types\Decorators;

use MrColor\Types\Contracts\AddsAlpha;
use MrColor\Types\Contracts\Stringable;
use MrColor\Types\Hex;

/**
 * Class ARGB
 * @package MrColor\Types\Decorators
 */
class ARGB implements Stringable, AddsAlpha
{
    /**
     * @var Hex
     */
    private $type;

    /**
     * @param Hex $hex
     */
    public function __construct(Hex $hex)
    {
        $this->type = $hex;
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
        return json_encode(['argb' => $this->__toString(), 'css' => $this->__toString()], $options);
    }

    /**
     * Convert the type to a string
     * @return mixed
     */
    public function __toString()
    {
        $hex = $this->type->getAttribute('hex');
        $alpha = dechex(round($this->type->getAttribute('alpha') * 255));

        return "#" . strtoupper($alpha) . strtoupper($hex);
    }

    /**
     * @param float $alpha
     *
     * @return $this
     */
    public function alpha($alpha = 1.0)
    {
        $this->type->alpha($alpha);

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
        if ( $method === "argb" ) {
            return $this;
        }

        return call_user_func_array([$this->type, $method], $args);
    }
}
