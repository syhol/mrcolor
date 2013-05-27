<?php
namespace SyHolloway\MrColor;

use Exception;
use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Extension;
use SyHolloway\MrColor\Extension\Test;
use SyHolloway\MrColor\Extension\Toolkit;
use SyHolloway\MrColor\Extension\Formatter;

/**
 * Provides a parent class for MrColor extensions and 
 *
 * @package MrColor
 * @author Simon Holloway
 */
class ExtensionCollection
{
    
    private $extensions = array();
    
    private static $defaults = array();
    
    private static $init = false;
    
    public function __construct()
    {
        if( ! self::$init )
        {
            self::init();
        }
        
        $this->extensions = self::$defaults;
    }
    
    public function runAll(Color $color, $method, $args)
    {
        $result = null;
        
        foreach($this->extensions as $extension)
        {
            if(true === $extension->query($method))
            {
                $result = $extension->trigger($color, $method, $args);
                
                break;
            }
        }
        
        return $result;
    }
    
    public static function registerExtension(Extension $extension)
    {
        $this->extensions[] = $extension;
    }
    
    public static function deregisterExtension(Extension $extension)
    {
        foreach($this->extensions as $key => $posext)
        {
            //If objects of same class
            if($posext == $extension)
            {
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
        foreach(self::$defaults as $key => $posext)
        {
            //If objects of same class
            if($posext == $extension)
            {
                unset(self::$defaults[$key]);
            }
        }
    }
    
    public function init()
    {
        self::$init = true;
        
        self::$defaults[] = new Test();
        self::$defaults[] = new Toolkit();
        self::$defaults[] = new Formatter();
    }
}