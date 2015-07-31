<?php

namespace MrColor\Types\Decorators;

use MrColor\Types\Contracts\AddsAlpha;
use MrColor\Types\Contracts\Stringable;
use MrColor\Types\RGB;

/**
 * Class RGBA
 * @package MrColor\Types\Decorators
 */
class RGBA implements Stringable, AddsAlpha
{
    /**
     * @var RGB
     */
    protected $type;

    /**
     * @param RGB $RGB
     */
    public function __construct(RGB $RGB)
    {
        $this->type = $RGB;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        list($red, $green, $blue) = $this->type->getValues();

        $alpha = $this->type->getAttribute('alpha');

        return "rgba($red, $green, $blue, $alpha)";
    }

    /**
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        $values = $this->type->getValues();

        $values[] = $this->type->getAttribute('alpha');

        return json_encode(['rgba' => $values, 'css' => $this->__toString()], $options);
    }

    /**
     * @param float $alpha
     *
     * @return mixed
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
        if ($method === "rgba") return $this;

        return call_user_func_array([$this->type, $method], $args);
    }
}
