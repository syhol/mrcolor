<?php

namespace MrColor\Types;

/**
 * Interface TypeTransformableInterface
 * @package MrColor\Types
 */
interface TypeTransformableInterface
{
    /**
     * @return RGB
     */
    public function rgb();

    /**
     * @return RGBA
     */
    public function rgba();

    /**
     * @return HSL
     */
    public function hsl();

    /**
     * @return HSLA
     */
    public function hsla();

    /**
     * @return Hex
     */
    public function hex();

    /**
     * @return ARGB
     */
    public function argb();
}