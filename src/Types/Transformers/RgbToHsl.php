<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

class RgbToHsl implements TransformerInterface
{
    public function convert(ColorType $type)
    {
        $red = $type->getAttribute('red');
        $green = $type->getAttribute('green');
        $blue = $type->getAttribute('blue');
        $alpha = $type->getAttribute('alpha');

        $max = max($red, $green, $blue);
        $min = min($red, $green, $blue);
        $chroma = $max - $min;

        $lightness = ($max + $min) / 2;

        $hue = 0;
        $saturation = 0;

        if ($chroma != 0)
        {
            $hue = $this->calculateHue($max, $red, $green, $blue, $chroma);
            $saturation = $this->calculateSaturation($lightness, $chroma, $max, $min);
        }

        // Return HSLA Color as array
        return array($hue, $saturation, $lightness, $alpha);
    }

    /**
     * @param $max
     * @param $red
     * @param $green
     * @param $blue
     * @param $chroma
     * @return float
     */
    private function calculateHue($max, $red, $green, $blue, $chroma)
    {
        switch ($max)
        {
            case $red:
                $hue = fmod((($green - $blue) / $chroma), 6);
                if ($hue < 0) $hue = (6 - fmod(abs($hue), 6));
                break;
            case $green:
                $hue = ($blue - $red) / $chroma + 2;
                break;
            case $blue:
                $hue = ($red - $green) / $chroma + 4;
                break;
        }

        return floor(($hue / 6) * 360);
    }

    /**
     * @param $lightness
     * @param $chroma
     * @param $max
     * @param $min
     * @return float
     */
    private function calculateSaturation($lightness, $chroma, $max, $min)
    {
        return $chroma / ($lightness < 0.5 ? $max + $min : 2 - $max - $min);
    }
}
