<?php namespace MrColor\Types;

/**
 * Class HSLA
 * @package MrColor\Types
 */
class HSLA extends ColorType
{
    /**
     * @var
     */
    private $hue;
    /**
     * @var
     */
    private $saturation;
    /**
     * @var
     */
    private $lightness;
    /**
     * @var
     */
    private $alpha;

    /**
     * @param $hue
     * @param $saturation
     * @param $lightness
     * @param $alpha
     */
    public function __construct($hue, $saturation, $lightness, $alpha)
    {
        $this->hue = $hue;
        $this->saturation = $saturation;
        $this->lightness = $lightness;
        $this->alpha = $alpha;
    }

    /**
     * @return Hex
     */
    public function toHex()
    {
        $hue = $this->hue / 360;
        $saturation = $this->saturation;
        $lightness = $this->lightness;

        if ($saturation == 0) {
            $r = $lightness * 255;
            $g = $lightness * 255;
            $b = $lightness * 255;
        } else {
            $var_2 = ($lightness < 0.5) ?  $lightness * (1 + $saturation) : ($lightness + $saturation) - ($saturation * $lightness);
            $var_1 = 2 * $lightness - $var_2;
            $r = round(255 * $this->hueToRgb($var_1, $var_2, $hue + (1 / 3)));
            $g = round(255 * $this->hueToRgb($var_1, $var_2, $hue));
            $b = round(255 * $this->hueToRgb($var_1, $var_2, $hue - (1 / 3)));
        }
        $hex = array(
            dechex($r),
            dechex($g),
            dechex($b)
        );
        //Make sure the hex is 6 digit
        foreach ($hex as $key => $value) {
            $hex[$key] = strlen($value) === 1 ? '0' . $value : $value ;
        }

        return new Hex(implode('', $hex));
    }

    /**
     * @return HSLA
     */
    public function toHsl()
    {
        return $this;
    }

    /**
     * @return RGBA
     */
    public function toRgb()
    {
        return $this->toHex()->toRgb();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "hsla({$this->hue}, {$this->saturation}%, {$this->lightness}%, {$this->alpha})";
    }

    /**
     * Given a Hue, returns corresponding RGB value
     *
     * @param  float $v1
     * @param  float $v2
     * @param  float $vH
     * @return float
     */
    private function hueToRgb($v1, $v2, $vH)
    {
        if ($vH < 0) {
            $vH += 1;
        }
        if ($vH > 1) {
            $vH -= 1;
        }
        if ((6 * $vH) < 1) {
            return ($v1 + ($v2 - $v1) * 6 * $vH);
        }
        if ((2 * $vH) < 1) {
            return $v2;
        }
        if ((3 * $vH) < 2) {
            return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
        }
        return $v1;
    }
}
