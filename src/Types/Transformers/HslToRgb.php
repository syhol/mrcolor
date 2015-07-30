<?php

namespace MrColor\Types\Transformers;

use MrColor\ColorDictionary;
use MrColor\Types\ColorType;

/**
 * Class HslToRgb
 * @package MrColor\Types\Transformers
 */
class HslToRgb implements TransformerInterface
{
    /**
     * @param ColorType $type
     * @return array
     */
    public function convert(ColorType $type)
    {
        list($hue, $saturation, $lightness, $alpha) = $this->getHslValues($type);

        /**
         * Lookup the value in the dictionary first
         */
        if ($lookup = ColorDictionary::hsl(round($hue * 360), round($saturation * 100), round($lightness * 100)))
        {
            ! $alpha ? : $lookup[1]['rgb'][] = $alpha;

            return $lookup[1]['rgb'];
        }

        if ($saturation == 0) return array_fill(0, 3, $lightness);
        
        $q = $lightness < 0.5 ? ($lightness * (1 + $saturation)) : ($lightness + $saturation - $lightness * $saturation);

        $p = 2 * $lightness - $q;

        $rgb = [
            round($this->hueToRgb($p, $q, $hue + 1/3) * 255),
            round($this->hueToRgb($p, $q, $hue) * 255),
            round($this->hueToRgb($p, $q, $hue - 1/3) * 255)
        ];

        ! $alpha ? : $rgb[] = $alpha;

        return $rgb;
    }

    /**
     * @param $p
     * @param $q
     * @param $t
     *
     * @return float
     */
    private function hueToRgb($p, $q, $t)
    {
        if ($t < 0) $t += 1;
        if ($t > 1) $t -= 1;
        if ($t < 1 / 6) return $p + ($q - $p) * 6 * $t;
        if ($t < 1 / 2) return $q;
        if ($t < 2 / 3) return $p + ($q - $p) * (2 / 3 - $t) * 6;

        return $p;
    }

    /**
     * @param ColorType $type
     *
     * @return array
     */
    protected function getHslValues(ColorType $type)
    {
        $hue = $type->getAttribute('hue');
        $saturation = $type->getAttribute('saturation');
        $lightness = $type->getAttribute('lightness');
        $alpha = $type->getAttribute('alpha');

        return array($hue, $saturation, $lightness, $alpha);
    }
}
