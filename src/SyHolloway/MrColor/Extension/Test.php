<?php
namespace SyHolloway\MrColor\Extension;

use SyHolloway\MrColor\Color;
use SyHolloway\MrColor\Extension;

/**
 * Tests the Color object
 *
 * @package MrColor
 * @author Simon Holloway
 */
class Test extends Extension
{
    /**
     * Stores each of the the given colors properties then updates each one.
     * one by one all the values update eachother.
     * if the values are still the same at the end, its a pass, else its a fail
     *
     * @param  object  $color      Color object
     * @param  boolean $test_order run the test a second time in a random order
     * @return mixed   boolean true if its a pass or array of the diffrences if its a fail
     */
    private function textColor(Color $color, $test_order = false)
    {
        $props = array('red', 'saturation', 'hex', 'green', 'lightness', 'blue', 'hue');

        $orignal = array();

        foreach ($props as $prop) {
            $orignal[$prop] = $color->$prop;
            $color->$prop = $color->$prop;
        }

        if ($test_order) {
            shuffle($props);

            foreach ($props as $prop) {
                $color->$prop = $color->$prop;
            }
        }

        foreach ($props as $prop) {
            if ($orignal[$prop] !== $color->$prop) {
                return array('orignal' => $orignal[$prop], 'new' => $color->$prop);
            }
        }

        return true;
    }

    /**
     * Run a test, send multiple generated colors through the $this->textColor() method
     *
     * Tests the integrety of the property update system in the color class
     *
     * @param object  $color      Color object
     * @param integer $strength   lower the number, the more colors generated thus more powerful test
     * @param boolean $test_order see $this->textColor()
     * @see $this->textColor()
     * @return array test results
     */
    public function test(Color $color, $strength = 20, $test_order = false)
    {
        set_time_limit(600);

        $pass = $fail = 0;

        $errors = array();

        for ($r = 0; $r <= 255; $r = $r + $strength) {
            for ($g = 0; $g <= 255; $g = $g + $strength) {
                for ($b = 0; $b <= 255; $b = $b + $strength) {
                    $color = Color::create(array('red' => $r, 'green' => $g, 'blue' => $b));

                    $result = $this->textColor($color, $test_order);

                    if (true === $result) {
                        $pass++;
                    } else {
                        $fail++;
                        $errors[] = $result;
                    }
                }
            }
        }

        return array('passes' => $pass, 'fails' => $fail, 'errors' => $errors);
    }
}
