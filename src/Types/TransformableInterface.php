<?php

namespace MrColor\Types;

/**
 * Interface TransformableInterface
 * @package MrColor\Types
 */
interface TransformableInterface
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