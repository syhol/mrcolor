<?php namespace MrColor\Types\Transformers;

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

        if($s == 0){
            $r = $g = $b = $l; // achromatic
        }
        else
        {
            $q = $l < 0.5 ? ($l * (1 + $s)) : ($l + $s - $l * $s);
            $p = 2 * $l - $q;
            $r = $this->hueToRgb($p, $q, $h + 1/3);
            $g = $this->hueToRgb($p, $q, $h);
            $b = $this->hueToRgb($p, $q, $h - 1/3);
        }

        return [$r, $g, $b];
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
