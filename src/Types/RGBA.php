<?php

namespace MrColor\Types;

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
        list($red, $green, $blue) = $this->getValues();

        $alpha = $this->getAttribute('alpha');

        return $alpha ? "rgba($red, $green, $blue, $alpha)" :
            "rgb($red, $green, $blue)";
    }

    /**
     * Return JSON represenation of this object
     * @return mixed
     */
    public function toJson()
    {
        $values = $this->getValues();

        $alpha = $this->getAttribute('alpha');

        ! $alpha ? : $values[] = $alpha;

        return json_encode(['rgb' => $values, 'css' => $this->__toString()]);
    }

    /**
     * @return array
     */
    private function getValues()
    {
        return [
            $this->getAttribute('red'),
            $this->getAttribute('green'),
            $this->getAttribute('blue')
        ];
    }
}
