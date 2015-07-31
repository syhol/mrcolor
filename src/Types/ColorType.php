<?php

namespace MrColor\Types;

use MrColor\Types\Contracts\AddsAlpha;
use MrColor\Types\Contracts\Attributable;
use MrColor\Types\Contracts\Stringable;
use MrColor\Types\Contracts\Transformable;
use MrColor\Types\Contracts\Transformer;
use MrColor\Types\Decorators\ARGB;
use MrColor\Types\Decorators\HSLA;
use MrColor\Types\Decorators\RGBA;
use ReflectionClass;

/**
 * Class ColorType
 * @package MrColor\Types
 */
abstract class ColorType implements Stringable, Transformable, Attributable
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * Set the alpha value on the color type
     *
     * @param double $alpha
     * @return double
     */
    public function setAlpha($alpha = 1.0)
    {
        $this->setAttribute('alpha', $alpha > 1 ?
            round($alpha / 100, 2) :
            round($alpha, 2));

        return $this;
    }

    /**
     * Return an RGBA decorator
     *
     * @return RGBA
     */
    public function toRgba()
    {
        return new RGBA($this->toRgb());
    }

    /**
     * Return an HSLA decorator
     *
     * @return HSLA
     */
    public function toHsla()
    {
        return new HSLA($this->toHsl());
    }

    /**
     * Return an ARGB decorator
     *
     * @return ARGB
     */
    public function toArgb()
    {
        return new ARGB($this->toHex());
    }

    /**
     * Run a color type through a transformer and return a new
     * color type.
     *
     * @param Transformer $transformer
     * @param                                        $class
     *
     * @return object
     */
    public function transform(Transformer $transformer, $class)
    {
        $reflection = new ReflectionClass($class);

        return $reflection->newInstanceArgs($transformer->convert($this));
    }

    /**
     * Retrieve a specific attribute
     *
     * @param $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    /**
     * Set an attribute
     *
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * Retrieve type attributes
     *
     * @param bool $keyed
     * @return array
     */
    public function getAttributes($keyed = true)
    {
        return $keyed ? $this->attributes : array_values($this->attributes);
    }

    /**
     * Merge an array of attributes into this object
     *
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }
}