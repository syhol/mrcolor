<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use MrColor\Types\Hex;
use MrColor\Types\HSLA;

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
        $this->colorType = $this->colorType->toHsl();
    }

    /**
     * @Given /^I convert it to RGBA$/
     */
    public function iConvertItToRGBA()
    {
        $this->colorType = $this->colorType->toRgb();
    }

    /**
     * @Given /^I convert it to Hex$/
     */
    public function iConvertItToHex()
    {
        $this->colorType = $this->colorType->toHex();
    }

    /**
     * @Then /^It should have correct hue (.*), saturation (.*) and lightness (.*)$/
     */
    public function itShouldHaveCorrectHueSaturationAndLightness($hue, $saturation, $lightness)
    {
        if ( (string) $this->colorType !== "hsla({$hue}, {$saturation}%, {$lightness}%, 1)" )
            throw new Exception("Expecting hsla({$hue}, {$saturation}%, {$lightness}%, 1)\n
                Received {$this->colorType}\n");
    }

    /**
     * @Then /^It should have correct red (.*), green (.*) and blue (.*)$/
     */
    public function itShouldHaveCorrectRedGreenAndBlue($red, $green, $blue)
    {
        if ( (string) $this->colorType !== "rgba({$red}, {$green}, {$blue}, 1)" )
            throw new Exception("Expecting rgba({$red}, {$green}, {$blue}, 1)\n
                Received {$this->colorType}\n");
    }

    /**
     * @Then /^it should have hexcode (.*)$/
     */
    public function itShouldHaveHexcode($hex)
    {
        if ( (string) $this->colorType !== $hex )
            throw new Exception("Expecting $hex\n
                Received {$this->colorType}\n");
    }
}
