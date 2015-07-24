<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

class HslToRgb implements TransformerInterface
{
    public function convert(ColorType $type)
    {
        extract($type->getAttributes());

        if ($saturation == 0)
        {
            $rgb = array($lightness, $lightness, $lightness);
        }
        else
        {
            $chroma = (1 - abs(2 * $lightness - 1)) * $saturation;
            $h_ = $hue * 6;
            $x = $chroma * (1 - abs((fmod($h_, 2)) - 1));
            $m = $lightness - round($chroma / 2, 10);

            if ($h_ >= 0 && $h_ < 1)
            {
                $rgb = [($chroma + $m), ($x + $m), $m];
            }
            else if ($h_ >= 1 && $h_ < 2)
            {
                $rgb = [($x + $m), ($chroma + $m), $m];
            }
            else if ($h_ >= 2 && $h_ < 3)
            {
                $rgb = [$m, ($chroma + $m), ($x + $m)];
            }
            else if ($h_ >= 3 && $h_ < 4)
            {
                $rgb = [$m, ($x + $m), ($chroma + $m)];
            }
            else if ($h_ >= 4 && $h_ < 5)
            {
                $rgb = [($x + $m), $m, ($chroma + $m)];
            }
            else if ($h_ >= 5 && $h_ < 6)
            {
                $rgb = [($chroma + $m), $m, ($x + $m)];
            }
        }

        return $rgb;
    }
}
