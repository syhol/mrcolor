<?php
namespace SyHolloway\MrColor\Format;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Format;

/**
 * Hex format for MrColor. It's used only for internal purposes.
 *
 * @package MrColor
 * @author Simon Holloway
 */
class Hex extends Format
{
    /**
     * The current color in this format
     *
     * @var array
     */
    protected $values = array(
        'hex' => 0
    );

    /**
     * Return the corresponding hex color value for the value in this format
     *
     * @return string (6 characters, hex color value, no hash)
     */
    public function toHex()
    {
        return $this->values['hex'];
    }

    /**
     * Load the given hex color value into this format
     *
     * @param string (6 characters, hex color value, no hash)
     */
    public function fromHex($hex)
    {
        $this->values = array(
            'hex' => $hex
        );
    }
}
