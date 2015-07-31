<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\Contracts\Attributable;
use MrColor\Types\Contracts\Transformer;

/**
 * Class HexToRgb
 * @package MrColor\Types\Transformers
 */
class HexToRgb implements Transformer
{
    /**
     * @param Attributable $type
     *
     * @return array
     */
    public function convert(Attributable $type)
    {
        $hex = ltrim($type->getAttribute('hex'), '#');

        return array_map('hexdec', str_split($hex, 2));
    }
}
