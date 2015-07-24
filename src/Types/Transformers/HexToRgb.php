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
        return array_map('hexdec', str_split($type->getAttribute('hex'), 2));
    }
}
