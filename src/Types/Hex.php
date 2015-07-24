<?php

namespace MrColor\Types;

use MrColor\Types\Transformers\HexToHsl;
use MrColor\Types\Transformers\HexToRgb;
use ReflectionClass;

class Hex extends ColorType
{
    /**
     * @param string $hexCode
     */
    public function __construct($hexCode = '#000000')
    {
        $this->setAttribute('hex', ltrim($hexCode, '#'));
    }

    /**
     * @return Hex
     */
    public function toHex()
    {
        return $this;
    }

    /**
     * @return HSLA
     */
    public function toHsl()
    {
        return $this->transform(new HexToHsl(), HSLA::class);
    }

    /**
     * @return RGBA
     */
    public function toRgb()
    {
        return $this->transform(new HexToRgb(), RGBA::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "#" . strtolower($this->getAttribute('hex'));
    }
}