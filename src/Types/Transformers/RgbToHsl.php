<?php

namespace MrColor\Types\Transformers;

use MrColor\ColorDictionary;
use MrColor\Exceptions\ColorException;
use MrColor\Types\ColorType;

/**
 * Class RgbToHsl
 * @package MrColor\Types\Transformers
 */
class RgbToHsl implements TransformerInterface
{
    /**
     * @param ColorType $type
     *
     * @return array
     */
    public function convert(ColorType $type)
    {
        list($red, $green, $blue, $alpha) = $this->getRgbValues($type);

        /**
         * Lookup the value in the dictionary first
         */
        if ($lookup = ColorDictionary::rgb($red, $green, $blue))
        {
            return $this->applyAlpha($alpha, $lookup[1]['hsl']);
        }

        $red /= 255;
        $green /= 255;
        $blue /= 255;

        list($max, $lightness, $chroma) = $this->getHslValues($red, $green, $blue);

        return $this->applyAlpha($alpha, [
            round( $this->calculateHue($max, $red, $green, $blue, $chroma), 2 ),
            round( $this->calculateSaturation($chroma, $lightness), 2 ),
            round( $lightness, 2 )
        ]);
    }

    /**
     * @param $max
     * @param $red
     * @param $green
     * @param $blue
     * @param $chroma
     *
     * @return int
     * @throws ColorException
     */
    protected function calculateHue($max, $red, $green, $blue, $chroma)
    {
        $hue = false;

        if ( ! $chroma )
            return 0;

        switch ($max) {
            case $red:
                $hue = 60 * fmod((($green - $blue) / $chroma), 6);
                if ( $blue > $green ) {
                    $hue += 360;
                }
                break;

            case $green:
                $hue = 60 * (($blue - $red) / $chroma + 2);
                break;

            case $blue:
                $hue = 60 * (($red - $green) / $chroma + 4);
                break;
        }

        if ( ! $hue )
            throw new ColorException("An error occured translating to HSL.");

        return $hue;
    }

    /**
     * @param $chroma
     * @param $lightness
     *
     * @return float
     */
    protected function calculateSaturation($chroma, $lightness)
    {
        return $chroma == 0 ? 0 : $chroma / (1 - abs(2 * $lightness - 1));
    }

    /**
     * @param ColorType $type
     *
     * @return array
     */
    protected function getRgbValues(ColorType $type)
    {
        $red = $type->getAttribute('red');
        $green = $type->getAttribute('green');
        $blue = $type->getAttribute('blue');
        $alpha = $type->getAttribute('alpha');

        return [$red, $green, $blue, $alpha];
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     *
     * @return array
     */
    protected function getHslValues($red, $green, $blue)
    {
        $max = max($red, $green, $blue);
        $min = min($red, $green, $blue);

        $lightness = ($max + $min) / 2;
        $chroma = $max - $min;

        return [$max, $lightness, $chroma];
    }

    /**
     * @param $alpha
     * @param $array
     *
     * @return mixed
     *
     */
    protected function applyAlpha($alpha, $array)
    {
        ! $alpha ? : $array[] = $alpha;

        return $array;
    }
}
