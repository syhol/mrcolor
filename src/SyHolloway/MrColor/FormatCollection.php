<?php
namespace SyHolloway\MrColor;

use SyHolloway\MrColor\Format;
use SyHolloway\MrColor\Format\Rgb;
use SyHolloway\MrColor\Format\Hsl;

/**
 * Provides a collection manager for MrColor formats
 *
 * @package MrColor
 * @author Simon Holloway
 */
class FormatCollection
{

    private $formats = array();

    private static $defaults = array();

    private static $init = false;

    public function __construct()
    {
        if (! self::$init) {
            self::init();
        }

        foreach (self::$defaults as $format) {
            $this->formats[] = clone $format;
        }
    }

    public function update($key, $value, $currentHex)
    {
        foreach ($this->formats as $format) {
            if ($format->hasValue($key)) {
                $currentHex = $format->set($key, $value)->toHex();
                break;
            }
        }

        foreach ($this->formats as $format) {
            $format->fromHex($currentHex);
        }

        return $currentHex;
    }

    public function get($value)
    {
        foreach ($this->formats as $format) {
            if ($format->hasValue($value)) {
                return $format->get($value);
            }
        }

        return false;
    }

    public static function registerExtension(Format $format)
    {
        $this->formats[] = $format;
    }

    public static function deregisterExtension(Format $format)
    {
        foreach ($this->formats as $key => $posform) {
            //If objects of same class
            if ($posform == $format) {
                unset($this->formats[$key]);
            }
        }
    }

    public static function registerDefaultFormat(Format $format)
    {
        self::$defaults[] = $format;
    }

    public static function deregisterDefaultFormat(Format $format)
    {
        foreach (self::$defaults as $key => $posform) {
            //If objects of same class
            if ($posform == $format) {
                unset(self::$defaults[$key]);
            }
        }
    }

    public function init()
    {
        self::$init = true;

        self::registerDefaultFormat(new Rgb());
        self::registerDefaultFormat(new Hsl());
    }
}
