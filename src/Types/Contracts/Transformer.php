<?php

namespace MrColor\Types\Contracts;

/**
 * Interface Transformer
 * @package MrColor\Types\Transformers
 */
interface Transformer
{
    /**
     * @param Attributable $type
     *
     * @return mixed
     */
    public function convert(Attributable $type);
}