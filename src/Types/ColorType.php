<?php namespace MrColor\Types;

/**
 * Class ColorType
 * @package MrColor\Types
 */
abstract class ColorType
{
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
}