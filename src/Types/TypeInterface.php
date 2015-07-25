<?php namespace MrColor\Types;

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