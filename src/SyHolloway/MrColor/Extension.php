<?php
namespace SyHolloway\MrColor;

use Exception;
use SyHolloway\MrColor\Color;

/**
 * Provides a parent class for MrColor extensions and 
 *
 * @package MrColor
 * @author Simon Holloway
 */
abstract class Extension
{
    public function query($method)
    {
        return (is_callable(array($this, $method)));
    }
    
    public function trigger(Color $color, $method, $args)
    {
        if(is_callable(array($this, $method)))
        {
            array_unshift($args, $color);
            
            return call_user_func_array(array($this, $method), $args);
        }
        
        return null;
    }
}