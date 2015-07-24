<?php namespace MrColor\Types;
use MrColor\Types\Transformers\RgbToHex;
use MrColor\Types\Transformers\RgbToHsl;

/**
 * Class RGBA
 * @package MrColor\Types
 */
class RGBA extends ColorType
{
    /**
     * @param $red
     * @param $green
     * @param $blue
     * @param $alpha
     */
    public function __construct($red = 255, $green = 255, $blue = 255, $alpha = 1)
    {
        $this->setAttributes([
            'red' => $red,
            'green' => $green,
            'blue' => $blue,
            'alpha' => $alpha
        ]);
    }

    /**
     * @return Hex
     */
    public function toHex()
    {
        return $this->transform(new RgbToHex(), Hex::class);
    }

    /**
     * @return HSLA
     */
    public function toHsl()
    {
        return $this->transform(new RgbToHsl(), HSLA::class);
    }

    /**
     * @return RGBA
     */
    public function toRgb()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        extract($this->getAttributes());

        return "rgba($red, $green, $blue, $alpha)";
    }
}
