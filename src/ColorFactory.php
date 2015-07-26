<?php

namespace MrColor;

use MrColor\Types\ColorType;
use MrColor\Types\Hex;
use MrColor\Types\HSLA;
use MrColor\Types\RGBA;

/**
 * Class ColorFactory
 * @package MrColor
 */
class ColorFactory
{
    /**
     * @param $hex
     * @return Color
     */
    public function hex($hex)
    {
        return $this->color(new Hex($hex));
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @param null $alpha
     * @return Color
     */
    public function rgb($red, $green, $blue, $alpha = null)
    {
        return $this->color(new RGBA($red, $green, $blue, $alpha));
    }

    /**
     * @param $hue
     * @param $saturation
     * @param $lightness
     * @param null $alpha
     * @return Color
     */
    public function hsl($hue, $saturation, $lightness, $alpha = null)
    {
        return $this->color(new HSLA($hue, $saturation, $lightness, $alpha));
    }

    /**
     * @param ColorType $colorType
     * @return Color
     */
    private function color(ColorType $colorType)
    {
        return new Color($colorType);
    }
}
