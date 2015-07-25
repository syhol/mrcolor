<?php

namespace MrColor\Types\Transformers;

use MrColor\ColorDictionary;
use MrColor\Types\ColorType;

class RgbToHsl implements TransformerInterface
{
    public function convert(ColorType $type)
    {
        $red = $type->getAttribute('red');
        $green = $type->getAttribute('green');
        $blue = $type->getAttribute('blue');
        $alpha = $type->getAttribute('alpha');

        /**
         * Lookup the value in the dictionary first
         */
        if ($lookup = ColorDictionary::rgb($red, $green, $blue))
        {
            return $lookup[1]['hsl'];
        }

        $red /= 255;
        $green /= 255;
        $blue /= 255;

        $max = max( $red, $green, $blue );
        $min = min( $red, $green, $blue );

        $l = ( $max + $min ) / 2;
        $d = $max - $min;

        if( $d == 0 ){
            $h = $s = 0; // achromatic
        } else {
            $s = $d / ( 1 - abs( 2 * $l - 1 ) );

            switch( $max ){
                case $red:
                    $h = 60 * fmod( ( ( $green - $blue ) / $d ), 6 );
                    if ($blue > $green) {
                        $h += 360;
                    }
                    break;

                case $green:
                    $h = 60 * ( ( $blue - $red ) / $d + 2 );
                    break;

                case $blue:
                    $h = 60 * ( ( $red - $green ) / $d + 4 );
                    break;
            }
        }

        return [round( $h, 2 ), round( $s, 2 ), round( $l, 2 )];
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
        return $lightness < 0.5 ? $chroma / $max + $min : $chroma / (2 - $max - $min);
    }
}
