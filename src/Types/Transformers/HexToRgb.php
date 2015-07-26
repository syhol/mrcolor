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
        $hex = ltrim($type->getAttribute('hex'), '#');

        return array_map('hexdec', str_split($hex, 2));
    }
}
