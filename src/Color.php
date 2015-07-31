<?php

namespace MrColor;

use MrColor\Pallets\PalletInterface;
use MrColor\Types\Contracts\Stringable;

/**
 * Class Color
 * @package MrColor
 */
class Color
{
    /**
     * @var Stringable
     */
    protected $colorType;

    /**
     * @param Stringable $colorType
     */
    public function __construct(Stringable $colorType)
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
        $this->colorType = $this->colorType->toHex();

        return $this;
    }

    /**
     * Convert the color to RGB(A)
     *
     * @return $this
     */
    public function toRgb()
    {
        $this->colorType = $this->colorType->toRgb();

        return $this;
    }

    /**
     * Convert the color to HSL(A)
     *
     * @return $this
     */
    public function toHsl()
    {
        $this->colorType = $this->colorType->toHsl();

        return $this;
    }

    /**
     * @return $this
     */
    public function toArgb()
    {
        $this->colorType = $this->colorType->toArgb();

        return $this;
    }

    /**
     * @return $this
     */
    public function toHsla()
    {
        $this->colorType = $this->colorType->toHsla();

        return $this;
    }

    /**
     * @return $this
     */
    public function toRgba()
    {
        $this->colorType = $this->colorType->toRgba();

        return $this;
    }

    /**
     * @param PalletInterface $pallet
     *
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
    public function setAlpha($alpha)
    {
        $this->colorType->setAlpha($alpha);

        return $this;
    }

    /**
     * @return int
     */
    public function red()
    {
        $type = $this->colorType->toRgb();

        return intval($type->getAttribute('red'));
    }

    /**
     * @return int
     */
    public function green()
    {
        $type = $this->colorType->toRgb();

        return intval($type->getAttribute('green'));
    }

    /**
     * @return int
     */
    public function blue()
    {
        $type = $this->colorType->toRgb();

        return intval($type->getAttribute('blue'));
    }

    /**
     * @return int
     */
    public function hue()
    {
        $type = $this->colorType->toHsl();

        return intval(round($type->getAttribute('hue') * 360));
    }

    /**
     * @return int
     */
    public function saturation()
    {
        $type = $this->colorType->toHsl();

        return intval(round($type->getAttribute('saturation') * 100));
    }

    /**
     * @return int
     */
    public function lightness()
    {
        $type = $this->colorType->toHsl();

        return intval(round($type->getAttribute('lightness') * 100));
    }

    /**
     * @return string
     */
    public function hex()
    {
        $type = $this->colorType->toHex();

        return (string) $type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->colorType;
    }
}
