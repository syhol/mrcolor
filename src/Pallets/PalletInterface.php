<?php

namespace MrColor\Pallets;

use MrColor\Pallet;
use MrColor\Types\ColorType;
use MrColor\Types\Contracts\Stringable;

/**
 * Interface PalletInterface
 * @package MrColor\Pallets
 */
interface PalletInterface
{
    /**
     * @param Stringable $colorType
     *
     * @return Pallet
     */
    public function make(Stringable $colorType);
}