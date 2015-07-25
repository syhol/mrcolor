<?php namespace MrColor\Types;
use MrColor\Types\Transformers\HslToHex;
use MrColor\Types\Transformers\HslToRgb;
use MrColor\Types\Transformers\RgbToHex;

/**
 * Class HSLA
 * @package MrColor\Types
 */
class HSLA extends ColorType
{
    /**
     * @param $hue
     * @param $saturation
     * @param $lightness
     * @param $alpha
     */
    public function __construct($hue, $saturation, $lightness, $alpha = 1)
    {
        $this->setAttributes([
            'hue' => $hue / 360,
            'saturation' => $saturation > 1 ? $saturation / 100 : $saturation,
            'lightness' => $lightness > 1 ? $lightness / 100: $lightness,
            'alpha' => $alpha
        ]);
    }

    /**
     * @return Hex
     */
    public function hex()
    {
        return $this->rgb()->transform(new RgbToHex(), Hex::class);
    }

    /**
     * @return HSLA
     */
    public function hsl()
    {
        return $this;
    }

    /**
     * @return RGBA
     */
    public function rgb()
    {
        return $this->transform(new HslToRgb(), RGBA::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $saturation = round($this->getAttribute('saturation') * 100);
        $lightness  = round($this->getAttribute('lightness')  * 100);
        $hue        = round($this->getAttribute('hue') * 360);
        return "hsla({$hue}, {$saturation}%, {$lightness}%, {$this->getAttribute('alpha')})";
    }
}
