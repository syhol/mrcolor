<?php

namespace MrColor\Pallets;

use MrColor\Pallet;
use MrColor\Types\ColorType;

/**
 * Interface PalletInterface
 * @package MrColor\Pallets
 */
interface PalletInterface
{
    /**
     * @param ColorType $colorType
     * @return Pallet
     */
    public function make(ColorType $colorType);
}