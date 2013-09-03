<?php
namespace SyHolloway\MrColor;

use SyHolloway\MrColor\Extension;
use SyHolloway\MrColor\ExtensionCollection;

/**
 * A color utility that helps maintain a single color value across formats
 * 
 * @package MrColor
 * @version 0.2.0
 * @author Simon Holloway
 * @author Original Creators <http://mexitek.github.io/phpColors/>
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
     * Holds the alpha as a float
     * 
     * @var float
     */
    private $alpha = 1.0;
    
    /**
     * Hold object that manages a collection of MrColor formats
     * 
     * @var object FormatCollection
     */
    private $formats;
    
    /**
     * Hold object that manages a collection of MrColor extensions
     * 
     * @var object ExtensionCollection
     */
    private $extensions;
    
    /**
     * Instantiates the class with a value
     * 
     * key value pairs in an array of properties and values, i.e.
     * 
     * array(
     *  'red' => 22,
     *  'green => 44
     * )
     * 
     * @param array $values
     * @return object self
     */
    public function __construct($values = array())
    {
        $this->extensions = new ExtensionCollection();
        
        $this->formats = new FormatCollection();
        
        $this->bulkUpdate($values);
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
        return $this->update($name, $value);
    }
    
    /**
     * When getting the colors and alpah, allow even though they are private
     * 
     * @param string $name property name
     * @return mixed $this->$name property value
     */
    public function __get($name)
    {
        return ('hex' == $name || 'alpha' == $name) ? $this->$name : $this->formats->get($name) ;
    }

    /**
     * Updates the object with multiple values
     * 
     * 
     * Key value pairs in an array of properties and values, i.e.
     * 
     * array(
     *  'red' => 22,
     *  'green => 44
     * )
     * 
     * @param array $values
     * @return object self
     */
    public function bulkUpdate($values)
    {
        foreach ($values as $property => $value) {
            $this->update($property, $value);
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
        if ('hex' == $using || 'alpha' == $using) {
            $this->$using = $value;
        }
        
        $this->hex = $this->formats->update($using, $value, $this->hex);
        
        return $this;
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
     * Passes the current color object, called method and args the the ExtensionCollection 
     * 
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        
        return $this->extensions->runAll($this, $method, $args);
    }
    
    /**
     * Magic __callStatic method
     * 
     * Creates a new color object and passes the it with the 
     * called method and args the the ExtensionCollection
     *  
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::create(), $method), $args);
    }
    
    /**
     * Add a new extension object to the current color objects ExtensionCollection. 
     * 
     * @param object the extension object to add
     * @return object self
     */
    public function registerExtension(Extension $extension)
    {
        $this->extensions->registerExtension($extension);
        
        return $this;
    }
    
    /**
     * Remove an extension object from the current Color objects ExtensionCollection
     * 
     * @param object the extension object to remove
     * @return object self
     */
    public function deregisterExtension(Extension $extension)
    {
        $this->extensions->deregisterExtension($extension);
        
        return $this;
    }
    
    /**
     * Add a new format object to the current color objects FormatCollection. 
     * 
     * @param object the format object to add
     * @return object self
     */
    public function registerFormat(Format $format)
    {
        $this->formats->registerFormat($format);
        
        return $this;
    }

    /**
     * Remove an format object from the current Color objects FormatCollection
     * 
     * @param object the format object to remove
     * @return object self
     */
    public function deregisterFormat(Format $format)
    {
        $this->formats->deregisterFormat($format);
        
        return $this;
    }
    
    /**
     * static method to create a new color then method chain it
     * 
     * key value pairs in an array of properties and values, i.e.
     * 
     * array(
     *  'red' => 22,
     *  'green => 44
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
