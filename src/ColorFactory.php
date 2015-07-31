<?php

namespace MrColor;

use MrColor\Exceptions\ColorException;
use MrColor\Types\Contracts\Stringable;
use MrColor\Types\Decorators\ARGB;
use MrColor\Types\Decorators\HSLA;
use MrColor\Types\Decorators\RGBA;
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
        return $this->color($this->hexInstance($hex));
    }

    /**
     * @param $hex
     * @param $alpha
     *
     * @return Color
     */
    public function argb($hex, $alpha)
    {
        $argb = new ARGB($this->hexInstance($hex));

        return $this->color($argb->setAlpha($alpha));
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return Color
     */
    public function rgb($red, $green, $blue)
    {
        return $this->color($this->rgbInstance($red, $green, $blue));
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @param $alpha
     *
     * @return Color
     */
    public function rgba($red, $green, $blue, $alpha)
    {
        $rgba = new RGBA($this->rgbInstance($red, $green, $blue));

        return $this->color($rgba->setAlpha($alpha));
    }

    /**
     * @param int $hue
     * @param int $saturation
     * @param int $lightness
     * @return Color
     */
    public function hsl($hue, $saturation, $lightness)
    {
        return $this->color($this->hslInstance($hue, $saturation, $lightness));
    }

    /**
     * @param int $hue
     * @param int $saturation
     * @param int $lightness
     * @param int $alpha
     *
     * @return Color
     */
    public function hsla($hue, $saturation, $lightness, $alpha)
    {
        $hsla = new HSLA($this->hslInstance($hue, $saturation, $lightness));

        return $this->color($hsla->setAlpha($alpha));
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
     * @param Stringable $colorType
     *
     * @return Color
     */
    private function color(Stringable $colorType)
    {
        return new Color($colorType);
    }

    /**
     * @param $hue
     * @param $saturation
     * @param $lightness
     *
     * @return HSL
     */
    private function hslInstance($hue, $saturation, $lightness)
    {
        return new HSL($hue, $saturation, $lightness);
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     *
     * @return RGB
     */
    private function rgbInstance($red, $green, $blue)
    {
        return new RGB($red, $green, $blue);
    }

    /**
     * @param $hex
     *
     * @return Hex
     */
    private function hexInstance($hex)
    {
        return new Hex($hex);
    }
}
