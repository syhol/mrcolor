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
     * Convert the color type to Hexadecimal
     *
     * @return $this
     */
    public function toHex()
    {
        $this->colorType = $this->colorType->hex();

        return $this;
    }

    /**
     * Convert the color to RGB(A)
     *
     * @return $this
     */
    public function toRgb()
    {
        $this->colorType = $this->colorType->rgb();

        return $this;
    }

    /**
     * Convert the color to HSL(A)
     *
     * @return $this
     */
    public function toHsl()
    {
        $this->colorType = $this->colorType->hsl();

        return $this;
    }

    /**
     * @param PalletInterface $pallet
     * @return Pallet
     */
    public function makePallet(PalletInterface $pallet)
    {
        return $pallet->make($this->colorType);
    }

    /**
     * @param int $alpha
     *
     * @return $this
     */
    public function alpha($alpha)
    {
        $this->colorType->alpha($alpha);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->colorType;
    }
}
