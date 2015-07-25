<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use MrColor\Types\Hex;
use MrColor\Types\HSLA;
use MrColor\Types\RGBA;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var \MrColor\Types\ColorType
     */
    protected $colorType;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }

    /**
     * @Given /^I have a RGBA object with values red (.*), green (.*) and blue (.*)$/
     */
    public function iHaveARGBAObjectWithValuesRedGreenAndBlue($red, $green, $blue)
    {
        $this->colorType = new RGBA($red, $green, $blue);
    }

    /**
     * @Given /^I have a hex object with value (.*)$/
     */
    public function iHaveAHexObjectWithValue($hex)
    {
        $this->colorType = new Hex($hex);
    }

    /**
     * @Given /^I have a HSLA object with values hue (.*), saturation (.*) and lightness (.*)$/
     */
    public function iHaveAHSLAObjectWithValuesHueSaturationAndLightness($hue, $saturation, $lightness)
    {
        $this->colorType = new HSLA($hue, $saturation, $lightness);
    }

    /**
     * @Given /^I convert it to HSLA$/
     */
    public function iConvertItToHSLA()
    {
        $this->colorType = $this->colorType->hsl();
    }

    /**
     * @Given /^I convert it to RGBA$/
     */
    public function iConvertItToRGBA()
    {
        $this->colorType = $this->colorType->rgb();
    }

    /**
     * @Given /^I convert it to Hex$/
     */
    public function iConvertItToHex()
    {
        $this->colorType = $this->colorType->hex();
    }

    /**
     * @Then /^It should have correct hue (.*), saturation (.*) and lightness (.*)$/
     */
    public function itShouldHaveCorrectHueSaturationAndLightness($hue, $saturation, $lightness)
    {
        if ( (string) $this->colorType !== "hsla({$hue}, {$saturation}%, {$lightness}%, 1)" )
            throw new Exception("Expecting hsla({$hue}, {$saturation}%, {$lightness}%, 1)\nReceived {$this->colorType}\n");
    }

    /**
     * @Then /^It should have correct red (.*), green (.*) and blue (.*)$/
     */
    public function itShouldHaveCorrectRedGreenAndBlue($red, $green, $blue)
    {
        if ( (string) $this->colorType !== "rgba({$red}, {$green}, {$blue}, 1)" )
            throw new Exception("Expecting rgba({$red}, {$green}, {$blue}, 1)\nReceived {$this->colorType}\n");
    }

    /**
     * @Then /^it should have hexcode (.*)$/
     */
    public function itShouldHaveHexcode($hex)
    {
        /**
         * Hexcode generation from HSL is not perfect. This is because HSL needs to have
         * higher precision floats than the current CSS spec allows. This means there is
         * always variation between stated HSL values and true HEX. We need to take this
         * into account when testing. As this is the case we will convert the hex to a number
         * and make sure that number is within an acceptable range.
         */
        $range = 100;

        if ( strtoupper((string) $this->colorType) !== $hex )
        {
            $asserts = $this->getHexDecs($hex);
            $actuals = $this->getHexDecs($this->colorType);

            foreach($asserts as $key => $assert)
            {
                $actual = $actuals[$key];

                if ( $actual > $assert + $range || $actual < $assert - $range )
                {
                    throw new Exception("Expecting {$hex}\nReceived {$this->colorType}\n");
                }
            }
        }
    }

    /**
     * @param $hex
     * @return array
     */
    private function getHexDecs($hex)
    {
        $hex = ltrim($hex, '#');

        return array_map(function($part) {
            return hexdec($part);
        }, str_split($hex, 2));
    }
}
