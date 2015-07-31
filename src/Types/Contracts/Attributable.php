<?php

namespace MrColor\Types\Contracts;

/**
 * Interface Attributable
 * @package MrColor\Types\Contracts
 */
interface Attributable
{
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getAttribute($key);

    /**
     * @param bool $keyed
     *
     * @return mixed
     */
    public function getAttributes($keyed = false);

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function setAttribute($key, $value);

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes);
}