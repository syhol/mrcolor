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
    public function __construct($red = 255, $green = 255, $blue = 255, $alpha = null)
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
    public function hex()
    {
        return $this->transform(new RgbToHex(), Hex::class);
    }

    /**
     * @return HSLA
     */
    public function hsl()
    {
        return $this->transform(new RgbToHsl(), HSLA::class);
    }

    /**
     * @return RGBA
     */
    public function rgb()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        extract($this->getAttributes());

        return $alpha ? "rgba($red, $green, $blue, $alpha)" :
            "rgb($red, $green, $blue)";
    }

    /**
     * Return JSON represenation of this object
     * @return mixed
     */
    public function toJson()
    {
        // TODO: Implement toJson() method.
    }
}
