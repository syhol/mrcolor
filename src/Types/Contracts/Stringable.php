<?php

namespace MrColor\Types\Contracts;

/**
 * Interface Stringable
 * @package MrColor\Types
 */
interface Stringable {

    /**
     * Convert to JSON
     *
     * @param int $options
     *
     * @return mixed
     */
    public function toJson($options = 0);

    /**
     * Convert the type to a string
     *
     * @return mixed
     */
    public function __toString();
}