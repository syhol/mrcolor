<?php namespace MrColor\Types\Transformers;

use MrColor\Types\ColorType;

interface TransformerInterface
{
    public function convert(ColorType $type);
}