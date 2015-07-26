<?php namespace MrColor\Pallets;

use MrColor\Pallet;
use MrColor\Types\ColorType;

interface PalletInterface
{
    /**
     * @param ColorType $colorType
     * @return Pallet
     */
    public function make(ColorType $colorType);
}