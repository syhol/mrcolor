<?php
namespace SyHolloway\MrColor;

use SyHolloway\MrColor\Color;

/**
 * Provides a parent class for MrColor extensions.
 *
 * @package MrColor
 * @author Simon Holloway
 */
abstract class Extension
{
    /**
     * Check if this object wants to handel this method call.
     * 
     * @param  string $method
     * @return boolean
     */
    public function query($method)
    {
        return (is_callable(array($this, $method)));
    }
    
    /**
     * Handel the method call.
     * 
     * @param  Color   $color   the color object the function was called on
     * @param  string  $method  the method name
     * @param  array   $args    arguments
     * @return mixed            this will be returned to the client code
     */
    public function trigger(Color $color, $method, $args)
    {
        if (is_callable(array($this, $method))) {
            array_unshift($args, $color);
            
            return call_user_func_array(array($this, $method), $args);
        }
        
        return null;
    }
}
