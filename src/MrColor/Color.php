<?php
namespace SyHolloway\MrColor;

use \Exception;

/**
 * A color utility that helps maintain a single color value across multiple color formats
 * 
 * @package MrColor
 * @author Simon Holloway
 * @author Orignal Creators <http://mexitek.github.io/phpColors/>
 */
class Color
{
	/**
	 * Holds the hex as a string with no hash
	 * 
	 * @var string
	 */
    private $hex = '000000';
	
	/**
	 * Holds the hue as an float
	 * 
	 * @var float
	 */
    private $hue = 0.0;
	
	/**
	 * Holds the saturation as a float
	 * 
	 * @var float
	 */
    private $saturation = 0.0;
	
	/**
	 * Holds the lightness as a float
	 * 
	 * @var float
	 */
    private $lightness = 0.0;
	
	/**
	 * Holds the red value as an integer
	 * 
	 * @var integer
	 */
    private $red = 0;
	
	/**
	 * Holds the green value as an integer
	 * 
	 * @var integer
	 */
    private $green = 0;
	
	/**
	 * Holds the blue value as an integer
	 * 
	 * @var integer
	 */
    private $blue = 0;
	
	/**
	 * Holds the alpha as a float
	 * 
	 * @var float
	 */
    private $alpha = 1.0;
	
	/**
	 * Holds an array of class names to use in the magic __call method
	 * 
	 * @var array
	 */
    private static $tools = array(
    	'\SyHolloway\MrColor\Formatter', 
    	'\SyHolloway\MrColor\Toolkit',
    	'\SyHolloway\MrColor\Test'
	);
	
    /**
     * Instantiates the class with a value
	 * 
	 * key value pairs in an array of properties and values, i.e.
	 * 
	 * array(
	 * 	'red' => 22,
	 * 	'green => 44
	 * )
	 * 
     * @param array $values
	 * @return object self
     */
    function __construct($values = array())
    {
    	$this->bulk_update($values);
	}
	
	/**
	 * When setting the colors, run it through the update function but allow access
	 * 
	 * @param string $name property name
	 * @param mixed $value property value
	 * @return mixed $this->$name property
	 */
	public function __set($name, $value)
    {
    	if(property_exists($this, $name))
		{
        	$this->update($name, $value);
			
			return $this->$name;
		}
    }
	
	/**
	 * When getting the colors and alpah, allow even though they are private
	 * 
	 * @param string $name property name
	 * @return mixed $this->$name property value
	 */
    public function __get($name)
    {
        if(property_exists($this, $name))
		{
			return $this->$name;
		}
    }
	
    /**
     * Returns your color hex string and adds a hash so can be used in css
	 * 
	 * @return string
     */
    public function __toString()
    {
        return '#' . $this->hex;
    }
	
    /**
     * Magic __call method
	 * 
	 * Runs the static runTools method to loop through
	 * other classes associated with the color class and 
	 * see if the called method exists in any of those classes
	 * then attempts to use it and returns what it returns
	 * 
	 * @param string $method
	 * @param array $args
	 * @return mixed
     */
    public function __call($method, $args)
    {
    	//Add this object to the args array
    	array_unshift($args, $this);
		
        return self::runTools($method, $args);
 	}
	
    /**
     * Magic __callStatic method
	 * 
	 * Runs the static runTools method to loop through
	 * other classes associated with the color class and 
	 * see if the called method exists in any of those classes
	 * then attempts to use it and returns what it returns
	 * 
	 * @param string $method
	 * @param array $args
	 * @return mixed
     */
    public static function __callStatic($method, $args)
    {
    	//Add a new color object to the args array for consistency
    	array_unshift($args, self::create());
		
        return self::runTools($method, $args);
 	}
	
	/**
	 * Sync current color with given color
	 * 
	 * The current color will receive all property values from given color
	 * 
	 * @param object $color Color object
	 * @return object self
	 */
    public function sync(Color $color)
    {
        foreach(array_keys(get_object_vars($this)) as $name)
		{
			$this->$name = $color->$name;
		}
		
		return $this;
    }
	
	/**
	 * Gets a clone of the current object
	 * 
	 * @return object Color clone of this
	 */
    public function copy()
    {
        return clone $this;
    }
	
	/**
     * Updates the object with multiple values
	 * 
	 * 
	 * Key value pairs in an array of properties and values, i.e.
	 * 
	 * array(
	 * 	'red' => 22,
	 * 	'green => 44
	 * )
	 * 
     * @param array $values
	 * @return object self
     */
	public function bulk_update($values)
	{
		if( ! is_array($values) || empty($values))
		{
			return $this;
		}
		
		foreach($values as $property => $value)
		{
			if(property_exists($this, $property))
			{
				$this->$property = $value;
			}
		}
		
		$keys = array_keys($values);
		
		if(in_array('hex', $keys))
		{
			$this->update('hex');
		}
		elseif(in_array('hue', $keys) || in_array('saturation', $keys) || in_array('lightness', $keys))
		{
			$this->update('hue');
		}
		elseif(in_array('red', $keys) || in_array('green', $keys) || in_array('blue', $keys))
		{
			$this->update('red');
		}
		
		return $this;
	}
	
	
    /**
     * Updates the object with a value
	 * 
	 * The property to update is set with the $using var
	 * the new value of the property specified is set with the $value var
	 * this method syncs all color properties based on the values passed
	 * 
     * @param string $using
     * @param string $value
	 * @return object self
     */
	public function update($using = 'hex', $value = false)
	{
		//Check if property does not exists
		if( ! property_exists($this, $using) )
		{
			return $this;
		}
		
		//Update the single property if needed
		$this->$using = ($value === false) ? $this->$using : $value ;
		
		$hex = $this->hex;
		
		$hsl = array(
			'H' => $this->hue,
			'S' => $this->saturation,
			'L' => $this->lightness
		);
		
		$rgb = array(
			'R' => $this->red,
			'G' => $this->green,
			'B' => $this->blue
		);
		
		$alpha = $this->alpha;
		
		if('hex' === $using)
		{
			$rgb = $this->hexToRgb($hex);
			$hsl = $this->rgbToHsl($rgb);
		}
		elseif('hue' === $using || 'saturation' === $using || 'lightness' === $using)
		{
			$rgb = $this->hslToRgb($hsl);
			$hex = $this->rgbToHex($rgb);
		}
		elseif('red' === $using || 'green' === $using || 'blue' === $using)
		{
			$hex = $this->rgbToHex($rgb);
			$hsl = $this->rgbToHsl($rgb);
		}
		
		$this->hex = strval($hex);
		
		$this->hue = floatval($hsl['H']);
		$this->saturation = floatval($hsl['S']);
		$this->lightness = floatval($hsl['L']);
		
		$this->red = intval($rgb['R']);
		$this->green = intval($rgb['G']);
		$this->blue = intval($rgb['B']);
		
		$this->alpha = floatval($alpha);
		
		return $this;
	}
	
    /**
     * Given a HEX string returns a RGB array equivalent
	 * 
     * @param string $hex
     * @return array RGB associative array
     */
    private function hexToRgb($hex)
    {
    	$rgb = array();

     	$rgb['R'] = hexdec($hex[0] . $hex[1]);
        $rgb['G'] = hexdec($hex[2] . $hex[3]);
        $rgb['B'] = hexdec($hex[4] . $hex[5]);

        return $rgb;
    }

    /**
     * Given an RGB associative array returns the equivalent HEX string
	 * 
     * @param array $rgb
     * @return string HEX string
     */
    private function rgbToHex($rgb)
    {
		$hex = array();
		
        $hex[0] = dechex($rgb['R']);
        $hex[1] = dechex($rgb['G']);
        $hex[2] = dechex($rgb['B']);
		
		//Make sure the hex is 6 digit
		foreach($hex as $key => $value) $hex[$key] = strlen($value) === 1 ? '0' . $value : $value ;
		
        return implode('', $hex);

	}
	
    /**
     * Given a RGB array returns a HSL array equivalent
	 * 
     * @param string $rgb
     * @return array HSL associative array
     */
    public function rgbToHsl($rgb)
    {
		extract($rgb);

        $HSL = array();

        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);

        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;

        $L = ($var_Max + $var_Min) / 2;

        if ($del_Max == 0)
        {
            $H = 0;
            $S = 0;
        }
        else
        {
            if ($L < 0.5) $S = $del_Max / ($var_Max + $var_Min );
            else          $S = $del_Max / (2 - $var_Max - $var_Min );

            $del_R = ((($var_Max - $var_R ) / 6) + ($del_Max / 2)) / $del_Max;
            $del_G = ((($var_Max - $var_G ) / 6) + ($del_Max / 2)) / $del_Max;
            $del_B = ((($var_Max - $var_B ) / 6) + ($del_Max / 2)) / $del_Max;

            if      ($var_R == $var_Max) $H = $del_B - $del_G;
            else if ($var_G == $var_Max) $H = (1 / 3) + $del_R - $del_B;
            else if ($var_B == $var_Max) $H = (2 / 3) + $del_G - $del_R;

            if ($H < 0) $H++;
            if ($H > 1) $H--;
        }

        $HSL['H'] = ($H * 360);
        $HSL['S'] = floatval($S);
        $HSL['L'] = floatval($L);

        return $HSL;
    }

    /**
     * Given a HSL associative array returns the equivalent RGB array
	 * 
     * @param array $HSL
     * @return string HEX string
     */
    public function hslToRgb($HSL)
    {
		list($H, $S, $L) = array($HSL['H'] / 360, $HSL['S'], $HSL['L'] );
		
        if($S == 0)
        {
            $r = $L * 255;
            $g = $L * 255;
            $b = $L * 255;
        }
        else
        {
            $var_2 = ($L < 0.5) ?  $L * (1 + $S) : ($L + $S) - ($S * $L);

            $var_1 = 2 * $L - $var_2;

            $r = round(255 * $this->hueToRgb($var_1, $var_2, $H + (1 / 3)));
            $g = round(255 * $this->hueToRgb($var_1, $var_2, $H));
            $b = round(255 * $this->hueToRgb($var_1, $var_2, $H - (1 / 3)));
        }

        // Convert to hex
        return array('R' => $r, 'G' => $g, 'B' => $b);
    }
	
	/**
     * Given a Hue, returns corresponding RGB value
	 * 
     * @param float $v1
     * @param float $v2
     * @param float $vH
     * @return float
     */
    private function hueToRgb($v1, $v2, $vH)
    {
        if($vH < 0)
        {
            $vH += 1;
        }

        if($vH > 1)
        {
            $vH -= 1;
        }

        if((6 * $vH) < 1)
        {
        	return ($v1 + ($v2 - $v1) * 6 * $vH);
        }

        if((2 * $vH) < 1)
        {
            return $v2;
        }

        if((3 * $vH) < 2)
        {
            return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
        }

        return $v1;
    }
	
	/**
	 * Check classes for extra methods
	 * 
	 * Loops through other classes associated with the color class and 
	 * see if the called method exists in any of those classes
	 * then attempts to use it and returns what it returns
	 * 
	 * @param string $method
	 * @param array $args
	 * @return mixed
	 */
    public static function runTools($method, $args)
    {
        foreach(self::$tools as $class)
		{
			if(is_callable(array($class, $method)))
			{
				return call_user_func_array($class . '::' . $method, $args);
			}
		}
		
		throw new Exception('Method "' . $method . '" not found in any color tools');
    }
	
    /**
     * Add a new tool class to the color class. 
	 * 
	 * the color class can be extended by looping 
	 * through a list of classes and there methods 
	 * when a method call to the color object is not recognised
	 * and calling any methods that match the called method,
	 * passing any passed params, including the color object the
	 * method was called from as the first param.
	 * 
	 * @param string $tool namespace + class name of tool
	 * @return object self
     */
    public static function registerTool($tool)
    {
        self::$tools[] = $tool;
		
		return $this;
    }
    /**
     * Remove a current tool class from the color class
	 * 
	 * @return string $tool namespace + class name of tool
     */
    public static function deregisterTool($tool)
    {
        self::$tools = array_diff(self::$tools, array($tool));
		
		return $this;
	}
	
	/**
	 * static method to create a new color then method chain it
	 * 
	 * key value pairs in an array of properties and values, i.e.
	 * 
	 * array(
	 * 	'red' => 22,
	 * 	'green => 44
	 * )
	 * 
     * @param array $values
	 * @return object Color
	 */
	public static function create($values = array())
	{
		return new self($values);
	}

}