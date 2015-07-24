<?php namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

/**
 * Class RgbToHex
 * @package MrColor\Types\Transformers
 */
class RgbToHex implements TransformerInterface
{
    /**
     * @param ColorType $type
     * @return array
     */
    public function convert(ColorType $type)
    {
        $red = round(255 * $type->getAttribute('red'));
        $green = round(255 * $type->getAttribute('green'));
        $blue = round(255 * $type->getAttribute('blue'));

        var_dump($red, $green, $blue);

        return ["#".sprintf("%02X",$red).sprintf("%02X",$green).sprintf("%02X",$blue)];
    }
}
