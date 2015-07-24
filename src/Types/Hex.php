<?php

namespace MrColor\Types;

class Hex extends ColorType
{
    /**
     * @var string
     */
    protected $hexCode;

    /**
     * @param string $hexCode
     */
    public function __construct($hexCode = '#000000')
    {
        $this->hexCode = ltrim($hexCode, '#');
    }

    /**
     * @return Hex
     */
    public function toHex()
    {
        return $this;
    }

    /**
     * @return HSLA
     */
    public function toHsl()
    {
        list($red, $green, $blue) = array_map(function($value) {

            return $value / 255;

        }, $this->getComponents());

        $min = min($red, $green, $blue);
        $max = max($red, $green, $blue);
        $difference = $max - $min;
        $lightness = ($max + $min) / 2;

        if ($difference == 0) {
            $hue = 0;
            $saturation = 0;
        } else {
            $saturation = $this->getSaturation($lightness, $difference, $max, $min);
            $hue = $this->getHue($red, $green, $blue, $max, $difference);
        }

        return $this->newHsla($hue, $saturation, $lightness);
    }

    /**
     * @return RGBA
     */
    public function toRgb()
    {
        list($red, $green, $blue) = $this->getComponents();

        return new RGBA($red, $green, $blue);
    }

    /**
     * @return array
     */
    private function getComponents()
    {
        $components = [];

        $hex = $this->hexCode;

        for($i = 0; $i < 6; $i+=2)
        {
            $components[] = $this->getComponentValue([$hex[$i], $hex[$i+1]]);
        }

        return $components;
    }

    /**
     * @param $part
     * @return number
     */
    private function getComponentValue($part)
    {
        return hexdec($part[0] . $part[1]);
    }

    /**
     * @param $lightness
     * @param $difference
     * @param $max
     * @param $min
     * @return float
     */
    private function getSaturation($lightness, $difference, $max, $min)
    {
        return $lightness < 0.5 ? $difference / ($max + $min) :
            $difference / ( 2 - $max - $min);
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @param $max
     * @param $difference
     * @return float
     */
    private function getHue($red, $green, $blue, $max, $difference)
    {
        list($redDiff, $greenDiff, $blueDiff) = $this->getMaxDifferences($red, $green, $blue, $max, $difference);

        if ($red == $max)
        {
            $hue = $blueDiff - $greenDiff;
        }
        elseif ($green == $max)
        {
            $hue = (1 / 3) + $redDiff - $blueDiff;
        }
        else if ($blue == $max)
        {
            $hue = (2 / 3) + $greenDiff - $redDiff;
        }

        $hue < 0 ? $hue++ : ($hue > 1 ? $hue-- : $hue);

        return $hue;
    }

    /**
     * @param $component
     * @param $max
     * @param $difference
     * @return float
     */
    private function getMaxDifference($component, $max, $difference)
    {
        return ((($max - $component) / 6) + ($difference / 2)) / $difference;
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @param $max
     * @param $difference
     * @return array
     */
    private function getMaxDifferences($red, $green, $blue, $max, $difference)
    {
        return [
            $this->getMaxDifference($red, $max, $difference),
            $this->getMaxDifference($green, $max, $difference),
            $this->getMaxDifference($blue, $max, $difference)
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "#" . $this->hexCode;
    }

    /**
     * @param $hue
     * @param $saturation
     * @param $lightness
     * @return HSLA
     */
    private function newHsla($hue, $saturation, $lightness)
    {
        $hue = intval($hue * 360);
        $saturation = floatval(round($saturation * 100));
        $lightness = floatval(round($lightness * 100));

        return new HSLA($hue, $saturation, $lightness, 1);
    }
}
