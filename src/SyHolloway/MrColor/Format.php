<?php
namespace SyHolloway\MrColor;

use SyHolloway\MrColor\Color;

/**
 * Provides a parent class for MrColor formats
 *
 * @package MrColor
 * @author Simon Holloway
 */
abstract class Format
{
    /**
     * The current color in this format
     *
     * @var array
     */
    protected $values = array();

    /**
     * Set the requested value
     *
     * @param string value name
     * @return object self
     */
    public function set($valuename, $value)
    {
        $this->values[$valuename] = $value;

        return $this;
    }

    /**
     * Get the requested value
     *
     * @param string value name
     * @return mixed
     */
    public function get($valuename)
    {
        return $this->values[$valuename];
    }

    /**
     * Check if this color format has the requested color value
     *
     * @return boolean
     */
    public function hasValue($valuename)
    {
        return isset($this->values[$valuename]);
    }

    /**
     * Return the corresponding hex color value for the value in this format
     *
     * @return string (6 characters, hex color value, no hash)
     */
    abstract public function toHex();

    /**
     * Load the given hex color value into this format
     *
     * @param string (6 characters, hex color value, no hash)
     */
    abstract public function fromHex($hex);
}
