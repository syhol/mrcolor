<?php
namespace SyHolloway\MrColor\Format;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Format;

/**
 * Red Green Blue format for MrColor
 *
 * @package MrColor
 * @author Simon Holloway
 */
class Rgb extends Format
{
    /**
     * The current color in this format
     *
     * @var array
     */
    protected $values = array(
        'red' => 0,
        'green' => 0,
        'blue' => 0
    );

    /**
     * Return the corresponding hex color value for the value in this format
     *
     * @return string (6 characters, hex color value, no hash)
     */
    public function toHex()
    {
        $hex = array(
            dechex($this->values['red']),
            dechex($this->values['green']),
            dechex($this->values['blue'])
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
        $this->values = array(
            'red' => hexdec($hex[0] . $hex[1]),
            'green' => hexdec($hex[2] . $hex[3]),
            'blue' => hexdec($hex[4] . $hex[5])
        );
    }
}
