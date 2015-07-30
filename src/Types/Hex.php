<?php

namespace MrColor\Types;

use MrColor\Types\Transformers\HexToRgb;
use MrColor\Types\Transformers\RgbToHsl;

/**
 * Class Hex
 * @package MrColor\Types
 */
class Hex extends ColorType
{
    /**
     * @param string $hexCode
     */
    public function __construct($hexCode = '#000000', $alpha = 1)
    {
        $this->setAttribute('hex', ltrim($hexCode, '#'));
        $this->setAttribute('alpha', $alpha > 1 ? $alpha / 100 : $alpha);
    }

    /**
     * @return Hex
     */
    public function hex()
    {
        return $this;
    }

    /**
     * @return HSL
     */
    public function hsl()
    {
        return $this->rgb()->transform(new RgbToHsl(), HSL::class);
    }

    /**
     * @return RGB
     */
    public function rgb()
    {
        return $this->transform(new HexToRgb(), RGB::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "#" . strtoupper($this->getAttribute('hex'));
    }

    /**
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode(['hex' => $this->__toString(), 'css' => $this->__toString()], $options);
    }
}
