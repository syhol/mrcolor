<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

class RgbToHex implements TransformerInterface
{
    public function convert(ColorType $type)
    {
        $red = $type->getAttribute('red');
        $green = $type->getAttribute('green');
        $blue = $type->getAttribute('blue');

        $red = round(255 * $red);
        $green = round(255 * $green);
        $blue = round(255 * $blue);

        return ["#".sprintf("%02X",$red).sprintf("%02X",$green).sprintf("%02X",$blue)];
    }
}
