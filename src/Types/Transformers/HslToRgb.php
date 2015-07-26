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
        $h = $type->getAttribute('hue');
        $s = $type->getAttribute('saturation');
        $l = $type->getAttribute('lightness');

        /**
         * Lookup the value in the dictionary first
         */
        if ($lookup = ColorDictionary::hsl(round($h * 360), round($s * 100), round($l * 100)))
        {
            return $lookup[1]['rgb'];
        }

        if ($s == 0) return array_fill(0, 3, $l);
        
        $q = $l < 0.5 ? ($l * (1 + $s)) : ($l + $s - $l * $s);
        $p = 2 * $l - $q;

        return [
            round($this->hueToRgb($p, $q, $h + 1/3) * 255),
            round($this->hueToRgb($p, $q, $h) * 255),
            round($this->hueToRgb($p, $q, $h - 1/3) * 255)
        ];
    }

    /**
     * @return \Closure
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
}
