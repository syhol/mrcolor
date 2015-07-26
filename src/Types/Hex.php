<?php

namespace MrColor\Types;

use MrColor\Contracts\Jsonable;
use MrColor\Types\Transformers\HexToHsl;
use MrColor\Types\Transformers\HexToRgb;
use MrColor\Types\Transformers\RgbToHsl;

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
    public function hex()
    {
        return $this;
    }

    /**
     * @return HSLA
     */
    public function hsl()
    {
        return $this->rgb()->transform(new RgbToHsl(), HSLA::class);
    }

    /**
     * @return RGBA
     */
    public function rgb()
    {
        return $this->transform(new HexToRgb(), RGBA::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "#" . strtoupper($this->getAttribute('hex'));
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode(['hex' => $this->__toString()]);
    }
}
