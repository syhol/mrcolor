<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use MrColor\Types\RGBA;

class HexToHsl implements TransformerInterface
{
    public function convert(ColorType $type)
    {
        $hex = str_split($type->getAttribute('hex'), 2);

        $r = (hexdec($hex[0])) / 255;
        $g = (hexdec($hex[1])) / 255;
        $b = (hexdec($hex[2])) / 255;

        return (new RgbToHsl())->convert(new RGBA($r, $g, $b, 1));
    }
}
