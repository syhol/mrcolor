<?php
namespace SyHolloway\MrColor\Format;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Format;

/**
 * Hue Saturation Lightness format for MrColor
 *
 * @package MrColor
 * @author Simon Holloway
 */
class Hsl extends Format
{
    /**
     * The current color in this format
     *
     * @var array
     */
    protected $values = array(
        'hue' => 0,
        'saturation' => 0,
        'lightness' => 0
    );

    /**
     * Return the corresponding hex color value for the value in this format
     *
     * @return string (6 characters, hex color value, no hash)
     */
    public function toHex()
    {
        $H = $this->values['hue'] / 360;
        $S = $this->values['saturation'];
        $L = $this->values['lightness'];

        if ($S == 0) {
            $r = $L * 255;
            $g = $L * 255;
            $b = $L * 255;
        } else {
            $var_2 = ($L < 0.5) ?  $L * (1 + $S) : ($L + $S) - ($S * $L);

            $var_1 = 2 * $L - $var_2;

            $r = round(255 * $this->hueToRgb($var_1, $var_2, $H + (1 / 3)));
            $g = round(255 * $this->hueToRgb($var_1, $var_2, $H));
            $b = round(255 * $this->hueToRgb($var_1, $var_2, $H - (1 / 3)));
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

        return implode('', $hex);
    }

    /**
     * Load the given hex color value into this format
     *
     * @param string (6 characters, hex color value, no hash)
     */
    public function fromHex($hex)
    {
        $R = hexdec($hex[0] . $hex[1]);
        $G = hexdec($hex[2] . $hex[3]);
        $B = hexdec($hex[4] . $hex[5]);

        $HSL = array();

        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);

        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;

        $L = ($var_Max + $var_Min) / 2;

        if ($del_Max == 0) {
            $H = 0;
            $S = 0;
        } else {

            if ($L < 0.5) {
                $S = $del_Max / ($var_Max + $var_Min );
            } else {
                 $S = $del_Max / (2 - $var_Max - $var_Min );
            }

            $del_R = ((($var_Max - $var_R ) / 6) + ($del_Max / 2)) / $del_Max;
            $del_G = ((($var_Max - $var_G ) / 6) + ($del_Max / 2)) / $del_Max;
            $del_B = ((($var_Max - $var_B ) / 6) + ($del_Max / 2)) / $del_Max;

            if ($var_R == $var_Max) {
                $H = $del_B - $del_G;
            } elseif ($var_G == $var_Max) {
                $H = (1 / 3) + $del_R - $del_B;
            } else if ($var_B == $var_Max) {
                $H = (2 / 3) + $del_G - $del_R;
            }

            if ($H < 0) {
                $H++;
            }
            if ($H > 1) {
                $H--;
            }
        }

        $this->values = array(
            'hue' => ($H * 360),
            'saturation' => floatval($S),
            'lightness' => floatval($L)
        );
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
