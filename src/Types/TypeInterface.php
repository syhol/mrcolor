<?php

namespace MrColor\Types;

/**
 * Interface TypeInterface
 * @package MrColor\Types
 */
interface TypeInterface {

    /**
     * @param int $alpha
     *
     * @return $this
     */
    public function alpha($alpha = 100);

    /**
     * Convert the type to a string
     * @return mixed
     */
    public function __toString();
}