<?php namespace MrColor\Types;

/**
 * Class RGBA
 * @package MrColor\Types
 */
class RGBA extends ColorType
{
    /**
     * @var integer
     */
    private $red;

    /**
     * @var integer
     */
    private $green;

    /**
     * @var integer
     */
    private $blue;

    /**
     * @var integer
     */
    private $alpha;

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @param $alpha
     */
    public function __construct($red, $green, $blue, $alpha = 1)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
        $this->alpha = $alpha;
    }

    /**
     * @return Hex
     */
    public function toHex()
    {
        $hex = array(
            $this->pad(dechex($this->red)),
            $this->pad(dechex($this->green)),
            $this->pad(dechex($this->blue))
        );

        return new Hex('#' . implode('', $hex));
    }

    /**
     * @return HSLA
     */
    public function toHsl()
    {
        return $this->toHex()->toHsl();
    }

    /**
     * @return RGBA
     */
    public function toRgb()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "rgba($this->red, $this->green, $this->blue, $this->alpha)";
    }

    /**
     * Pad a hex component with a 0 if it is not 2 characters long
     *
     * @param  string $component
     * @return string
     */
    private function pad($component)
    {
        return strlen($component) > 1 ? : '0' . $component;
    }
}
