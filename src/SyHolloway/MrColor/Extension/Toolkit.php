<?php
namespace SyHolloway\MrColor\Extension;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Extension;

/**
 * Manipulates the Color object
 *
 * @package MrColor
 * @author Simon Holloway
 */
class Toolkit extends Extension
{

    /**
     * Auto darkens/lightens by 10% for sexily-subtle gradients.
     * Set this to FALSE to adjust automatic shade to be between given color
     * and black (for darken) or white (for lighten)
     */
    const DEFAULT_ADJUST = 10;

    private $colorprops = array(
        'hex',
        'red',
        'green',
        'blue',
        'hue',
        'saturation',
        'lightness',
        'alpha'
    );

    /**
     * Returns whether or not given color is considered light
     *
     * i.e lightness is greater than 50%
     *
     * @param  object  $color Color object
     * @return boolean
     */
    public function isLight(Color $color)
    {
        return ($color->lightness > 0.5);
    }

    /**
     * Sync first color with second color
     *
     * The first color will receive all property values from the second color
     *
     * @param  object $firstcolor  first Color object to receive the values
     * @param  object $secondcolor second Color object to give the values
     * @return object self
     */
    public function sync(Color $firstcolor, Color $secondcolor)
    {
        foreach ($this->colorprops as $name) {
            $firstcolor->$name = $secondcolor->$name;
        }

        return $firstcolor;
    }

    public function dump(Color $color)
    {
        $props = array();

        foreach ($this->colorprops as $name) {
            $props[$name] = $color->$name;
        }

        var_dump($props);
    }

    /**
     * Gets a clone of the color object
     *
     * @param  object $color Color object
     * @return object Color clone of this
     */
    public function copy(Color $color)
    {
        return clone $color;
    }

    /**
     * Returns whether or not given color is considered dark
     *
     * i.e lightness is less than 50%
     *
     * @param  object  $color Color object
     * @return boolean
     */
    public function isDark(Color $color)
    {
        return ($color->lightness <= 0.5);
    }

    /**
     * Returns the complimentary color
     *
     * @param  object $color Color object
     * @return object Color object
     */
    public function getComplementary(Color $color)
    {
        $color->hue += $color->hue > 180 ? -180 : 180 ;

        return $color;
    }

    /**
     * Returns the cross browser CSS3 gradient
     *
     * @param  object  $color  Color object
     * @param  integer $amount Optional: percentage amount to light/darken the gradient
     * @return string  CSS3 gradient for chrome, safari, firefox, opera and IE10 with fallbacks
     */
    public function getCssGradient(Color $color, $amount = null)
    {
        // Get gradient colors
        if (self::isLight($color)) {
            $lightColor = $color->hex;
            $darkColor = self::darken($color->copy(), $amount)->hex;
        } else {
            $lightColor = self::lighten($color->copy(), $amount)->hex;
            $darkColor = $color->hex;
        }

        /* fallback/image non-cover color */
        $css = "background-color: #" . $color->hex . ";";

        /* IE Browsers */
        $css .= "filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#" . $lightColor . "', endColorstr='#" . $darkColor . "');";

        /* Safari 4+, Chrome 1-9 */
        $css .= "background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $lightColor . "), to(#" . $darkColor . "));";

        /* Safari 5.1+, Mobile Safari, Chrome 10+ */
        $css .= "background-image: -webkit-linear-gradient(top, #" . $lightColor . ", #" . $darkColor . ");";

        /* Firefox 3.6+ */
        $css .= "background-image: -moz-linear-gradient(top, #" . $lightColor . ", #" . $darkColor . ");";

        /* IE 10+ */
        $css .= "background-image: -ms-linear-gradient(top, #" . $lightColor . ", #" . $darkColor . ");";

        /* Opera 11.10+ */
        $css .= "background-image: -o-linear-gradient(top, #" . $lightColor . ", #" . $darkColor . ");";

        // Return our CSS
        return $css;
    }

    /**
     * Darkens color by a percentage a given Color object
     *
     * @param object $color Color object
     * @param integer
     * @return object Color
     */
    public function darken(Color $color, $amount = null, $ref = false)
    {
        $current = $color->lightness;

        $amount = ($amount === null) ? self::DEFAULT_ADJUST : $amount ;

        $amount = intval($amount) / 100;

        $new = $current - $amount;

        $new = ($new < 0) ? 0 : $new;

        $new = ($new > 1) ? 1 : $new;

        $color->lightness = floatval($new);

        return $color;
    }

    /**
     * Lightens color by a percentage a given Color object
     *
     * @param object $color Color object
     * @param integer
     * @return object Color
     */
    public function lighten(Color $color, $amount = null)
    {
        $current = $color->lightness;

        $amount = ($amount === null) ? self::DEFAULT_ADJUST : $amount ;

        $amount = intval($amount) / 100;

        $new = $current + $amount;

        $new = ($new < 0) ? 0 : $new;

        $new = ($new > 1) ? 1 : $new;

        $color->lightness = floatval($new);

        return $color;
    }
}
