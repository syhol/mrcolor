<?php
namespace SyHolloway\MrColor\Extension;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Extension;

/**
 * Interprets a wide range of inputs and uses them to build an instance of the color object
 * Also used to convert color objects back to standard formats
 *
 * @package MrColor
 * @author Simon Holloway
 */
class Formatter extends Extension
{

    /**
     * Given a Color object, returns a formatted hex string
     *
     * @param  object $color Color object
     * @return string
     */
    public function getHexString(Color $color)
    {
        return '#' . $color->hex;
    }

    /**
     * Given a Color object, returns a formatted rgb string
     *
     * @param  object $color Color object
     * @return string
     */
    public function getRgbString(Color $color)
    {
        return 'rgb('. $color->red . ', ' . $color->green . ', ' . $color->blue . ')';
    }

    /**
     * Given a Color object, returns a formatted rgba string
     *
     * @param  object $color Color object
     * @return string
     */
    public function getRgbaString(Color $color)
    {
        return 'rgb('. $color->red . ', ' . $color->green . ', ' . $color->blue . ', ' . $color->alpha . ')';
    }

    /**
     * Given a Color object, returns a formatted hsl string
     *
     * @param  object $color Color object
     * @return string
     */
    public function getHslString(Color $color)
    {
        return 'hsl('. round($color->hue) . ', ' . round($color->saturation * 100) . '%, ' . round($color->lightness * 100) . '%)';
    }

    /**
     * Given a Color object, returns a formatted hsla string
     *
     * @param  object $color Color object
     * @return string
     */
    public function getHslaString(Color $color)
    {
        return 'hsla('. round($color->hue) . ', ' . round($color->saturation * 100) . '%, ' . round($color->lightness * 100) . '%, ' . $color->alpha . ')';
    }

    /**
     * Pass a var in subject param and this method
     * will attempt to parse it into a color object
     * and return it
     *
     * @param  object $color   Color object
     * @param  mixed  $subject
     * @return object Color object
     */
    public function load(Color $color, $value)
    {
        $value = strtolower(trim($value));

        $format = $this->guess($value);

        if (is_callable(__CLASS__ . '::' . $format)) {
            $this->$format($color, $value);
        }

        return $color;
    }

    /**
     * Given a subject tries to discover the format,
     * then return the appropriate method name
     *
     * @param mixed
     * @return string|boolean string if found, boolean false if not found
     */
    private function guess($value)
    {
        if (is_string($value)) {
            $len = strlen($value);
            if (strpos($value, ' ') === false && strpos($value, ',') === false) {
                if (substr($value, 0, 1) === '#' && ($len === 7 || $len === 4)) {
                    return 'loadHexString';
                } elseif ($len === 6 || $len === 3) {
                    return 'loadHexString';
                }
            } elseif (substr($value, 0, 3) === 'rgb') {
                return 'loadRgbString';
            } elseif (substr($value, 0, 3) === 'hsl') {
                return 'loadHslString';
            }

        }

        //Bad Input
        return false;

    }

    /**
     * Loads a color object from a hex string
     *
     * @param object $color Color object
     * @param mixed
     * @return void
     */
    private function loadHexString(Color $color, $subject)
    {
        $subject = trim($subject);

        $subject = str_replace(array('#', ';', ' '), '', $subject);

        if (strlen($subject) !== 3 && strlen($subject) !== 6) {
            //Bad Input
            return false;
        } elseif (strlen($subject) === 3) {
            $subject = $subject[0] . $subject[0] .
                       $subject[1] . $subject[1] .
                       $subject[2] . $subject[2] ;
        }

        $color->hex = $subject;
    }

    /**
     * Loads a color object from an rgb or rgba string
     *
     * @param object $color Color object
     * @param mixed
     * @return void
     */
    private function loadRgbString(Color $color, $subject)
    {
        $subject = trim($subject);

        $subject = str_replace(array('rgba', 'rgb', '(', ')', ';', ' '), '', $subject);

        $rgbnum = explode(',', $subject);

        if (count($rgbnum) !== 3 && count($rgbnum) !== 4) {
            return false;
        }

        foreach ($rgbnum as &$val) {
            $val = floatval(trim($val));
        }

        $rgb = array(
            'red' => $rgbnum[0],
            'green' => $rgbnum[1],
            'blue' => $rgbnum[2]
        );

        if (isset($rgbnum[3])) {
            $rgb['alpha'] = $rgbnum[3];
        }

        $color->bulkUpdate($rgb);
    }

    /**
     * Loads a color object from a hsl or hsla string
     *
     * @param object $color Color object
     * @param mixed
     * @return void
     */
    private function loadHslString(Color $color, $subject)
    {
        $subject = trim($subject);

        $subject = str_replace(array('hsla', 'hsl', '(', ')', ';', ' '), '', $subject);

        $hslnum = explode(',', $subject);

        if (count($hslnum) !== 3 && count($hslnum) !== 4) {
            return false;
        }

        foreach ($hslnum as &$val) {
            $val = floatval(trim($val));
        }

        $hsl = array(
            'hue' => $hslnum[0],
            'saturation' => $hslnum[1],
            'lightness' => $hslnum[2]
        );

        if (isset($rgbnum[3])) {
            $hsl['alpha'] = $rgbnum[3];
        }

        $color->bulkUpdate($hsl);
    }
}
