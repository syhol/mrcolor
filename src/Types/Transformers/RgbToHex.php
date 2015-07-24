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
        return [join('', [
            '#',
            sprintf("%02X", round(255 * $type->getAttribute('red'))),
            sprintf("%02X", round(255 * $type->getAttribute('green'))),
            sprintf("%02X", round(255 * $type->getAttribute('blue')))
        ])];
    }
}
