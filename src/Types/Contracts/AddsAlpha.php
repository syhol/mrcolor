<?php

namespace MrColor\Types\Contracts;

/**
 * Interface AddsAlpha
 * @package MrColor\Types\Contracts
 */
interface AddsAlpha
{
    /**
     * @param float $alpha
     *
     * @return $this
     */
    public function setAlpha($alpha = 1.0);
}