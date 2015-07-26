<?php

namespace MrColor\Types;

/**
 * Interface TypeInterface
 * @package MrColor\Types
 */
interface TypeInterface {

    /**
     * @return RGBA
     */
    public function rgb();

    /**
     * @return HSLA
     */
    public function hsl();

    /**
     * @return Hex
     */
    public function hex();
}