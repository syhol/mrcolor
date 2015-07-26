<?php namespace MrColor\Types;

use MrColor\Contracts\Jsonable;
use MrColor\Types\Transformers\TransformerInterface;
use ReflectionClass;

/**
 * Class ColorType
 * @package MrColor\Types
 */
abstract class ColorType implements TypeInterface, Jsonable
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @return string
     */
    abstract public function __toString();

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
     * @param bool $keyed
     * @return array
     */
    public function getAttributes($keyed = true)
    {
        return $keyed ? $this->attributes : array_values($this->attributes);
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