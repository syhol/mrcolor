<?php
namespace SyHolloway\MrColor;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Extension;
use SyHolloway\MrColor\Extension\Test;
use SyHolloway\MrColor\Extension\Toolkit;
use SyHolloway\MrColor\Extension\Formatter;

/**
 * Provides a collection manager for MrColor extensions
 *
 * @package MrColor
 * @author Simon Holloway
 */
class ExtensionCollection
{
    /**
     * Hold an array of Extension objects
     * @var array
     */
    private $extensions = array();

    /**
     * Hold an array of default Extension objects
     * @var array
     */
    private static $defaults = array();

    /**
     * Is the ExtensionCollection initialized yet?
     * @var boolean
     */
    private static $init = false;

    public function __construct()
    {
        if (! self::$init) {
            self::init();
        }

        $this->extensions = self::$defaults;
    }

    public function runAll(Color $color, $method, $args)
    {
        $result = null;

        foreach ($this->extensions as $extension) {

            if (true === $extension->query($method)) {

                $result = $extension->trigger($color, $method, $args);

                break;
            }
        }

        return $result;
    }

    public function registerExtension(Extension $extension)
    {
        $this->extensions[] = $extension;
    }

    public function deregisterExtension(Extension $extension)
    {
        foreach ($this->extensions as $key => $posext) {
            //If objects of same class
            if ($posext == $extension) {
                unset($this->extensions[$key]);
            }
        }
    }

    public static function registerDefaultExtension(Extension $extension)
    {
        self::$defaults[] = $extension;
    }

    public static function deregisterDefaultExtension(Extension $extension)
    {
        foreach (self::$defaults as $key => $posext) {
            //If objects of same class
            if ($posext == $extension) {
                unset(self::$defaults[$key]);
            }
        }
    }

    public function init()
    {
        self::$init = true;

        self::registerDefaultExtension(new Test());
        self::registerDefaultExtension(new Toolkit());
        self::registerDefaultExtension(new Formatter());
    }
}
