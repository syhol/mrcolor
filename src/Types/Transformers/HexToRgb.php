<?php namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

/**
 * Class HexToRgb
 * @package MrColor\Types\Transformers
 */
class HexToRgb implements TransformerInterface
{
    /**
     * @param ColorType $type
     * @return array
     */
    public function convert(ColorType $type)
    {
        $hex = str_split($type->getAttribute('hex'), 2);

        $red   = hexdec($hex[0]);
        $green = hexdec($hex[1]);
        $blue  = hexdec($hex[2]);

        return [$red, $green, $blue];
    }
}
