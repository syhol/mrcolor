<?php

namespace MrColor\Types\Transformers;

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
        return $this->applyAlpha($type->getAttribute('alpha'), [join('', [
            '#',
            sprintf("%02X", round($type->getAttribute('red'))),
            sprintf("%02X", round($type->getAttribute('green'))),
            sprintf("%02X", round($type->getAttribute('blue')))
        ])]);
    }

    /**
     * @param $alpha
     * @param $array
     *
     * @return mixed
     *
     */
    protected function applyAlpha($alpha, $array)
    {
        ! $alpha ? : $array[] = $alpha;

        return $array;
    }

}
