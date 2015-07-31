<?php

namespace MrColor\Types\Contracts;

use MrColor\Types\Decorators\ARGB;
use MrColor\Types\Decorators\HSLA;
use MrColor\Types\Decorators\RGBA;
use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;

/**
 * Interface Transformable
 * @package MrColor\Types
 */
interface Transformable
{
    /**
     * @return RGB
     */
    public function toRgb();

    /**
     * @return RGBA
     */
    public function toRgba();

    /**
     * @return HSL
     */
    public function toHsl();

    /**
     * @return HSLA
     */
    public function toHsla();

    /**
     * @return Hex
     */
    public function toHex();

    /**
     * @return ARGB
     */
    public function toArgb();
}