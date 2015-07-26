<?php

namespace MrColor;

use MrColor\Pallets\PalletInterface;
use MrColor\Types\ColorType;

/**
 * Class Color
 * @package MrColor
 */
class Color
{
    /**
     * @var ColorType
     */
    protected $colorType;

    /**
     * @param ColorType $colorType
     */
    public function __construct(ColorType $colorType)
    {
        $this->colorType = $colorType;
    }

    /**
     * @return $this
     */
    public function toHex()
    {
        $this->colorType = $this->colorType->hex();

        return $this;
    }

    /**
     * @return $this
     */
    public function toRgb()
    {
        $this->colorType = $this->colorType->rgb();

        return $this;
    }

    /**
     * @return $this
     */
    public function toHsl()
    {
        $this->colorType = $this->colorType->hsl();

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->colorType;
    }

    /**
     * @param PalletInterface $pallet
     * @return Pallet
     */
    public function makePallet(PalletInterface $pallet)
    {
        return $pallet->make($this->colorType);
    }
}
