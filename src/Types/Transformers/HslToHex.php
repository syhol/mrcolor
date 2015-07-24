<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use MrColor\Types\RGBA;

class HslToHex implements TransformerInterface
{
    public function convert(ColorType $type)
    {
        list ($red, $green, $blue) = (new HslToRgb())->convert($type);

        $rgba = new RGBA($red, $green, $blue);

        return (new RgbToHex())->convert($rgba);
    }
}
