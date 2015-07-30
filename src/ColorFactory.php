<?php

namespace MrColor;

use MrColor\Exceptions\ColorException;
use MrColor\Types\ColorType;
use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;

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
        return $this->color(new RGB($red, $green, $blue, $alpha));
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
        return $this->color(new HSL($hue, $saturation, $lightness, $alpha));
    }

    /**
     * @param $name
     * @param string $type
     * @return mixed
     * @throws ColorException
     */
    public function name($name, $type = 'rgb')
    {
        $lookup = ColorDictionary::color($name);

        if ( ! $lookup )
            throw new ColorException("$name does not exist in the color dictionary.");

        return call_user_func_array([$this, $type], $lookup[1][$type]);
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
