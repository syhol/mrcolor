<?php

namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

/**
 * Interface TransformerInterface
 * @package MrColor\Types\Transformers
 */
interface TransformerInterface
{
    /**
     * @param ColorType $type
     *
     * @return mixed
     */
    public function convert(ColorType $type);
}