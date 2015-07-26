<?php namespace MrColor\Contracts;

/**
 * Interface Jsonable
 * @package MrColor\Contracts
 */
interface Jsonable
{
    /**
     * Return JSON represenation of this object
     * @return mixed
     */
    public function toJson();
}