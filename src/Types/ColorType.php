<?php namespace MrColor\Types;
use MrColor\Types\Transformers\TransformerInterface;
use ReflectionClass;

/**
 * Class ColorType
 * @package MrColor\Types
 */
abstract class ColorType
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @return Hex
     */
    abstract public function toHex();

    /**
     * @return HSLA
     */
    abstract public function toHsl();

    /**
     * @return RGBA
     */
    abstract public function toRgb();

    /**
     * @return string
     */
    abstract public function __toString();

    /**
     * @return HSLA
     */
    public function toHsla()
    {
        return $this->toHsl();
    }

    /**
     * @return RGBA
     */
    public function toRgba()
    {
        return $this->toRgb();
    }

    /**
     * @param TransformerInterface $transformer
     * @param $class
     * @return object
     */
    public function transform(TransformerInterface $transformer, $class)
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
     * Retrieve type attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
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
     * Merge an array of attributes into this object
     *
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }
}