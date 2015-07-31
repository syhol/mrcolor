<?php namespace MrColor\Contracts;

/**
 * Interface ColorToolKit
 * @package MrColor\Contracts
 */
interface ColorToolKit
{
    /**
     * Lighten the color by a given percentage
     *
     * @param $percentage
     *
     * @return mixed
     */
    public function lighten($percentage);

    /**
     * Darken the color by a given percentage
     *
     * @param $percentage
     *
     * @return mixed
     */
    public function darken($percentage);

    /**
     * Is the color dark?
     *
     * @return bool
     */
    public function isDark();

    /**
     * Is the color light?
     *
     * @return bool
     */
    public function isLight();

    /**
     * Is the color grey/gray?
     *
     * This is for British people, another cup of tea?
     *
     * @return bool
     */
    public function isGrey();

    /**
     * Is the color grey/gray?
     *
     * This is for American people
     * @see isGrey
     *
     * @return bool
     */
    public function isGray();

    /**
     * Logic for cloned color objects
     *
     * @return mixed
     */
    public function __clone();
}