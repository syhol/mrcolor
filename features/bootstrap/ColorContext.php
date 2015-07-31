<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * Defines application features from the specific context.
 */
class ColorContext implements Context, SnippetAcceptingContext
{
    /**
     * @var MrColor\Color
     */
    protected $color;

    /**
     * @Given /^I create a color from the factory with name (.*)$/
     */
    public function iCreateAColorFromTheFactoryWithName($name)
    {
        $factory = new MrColor\ColorFactory();

        $this->color = $factory->name($name);
    }

    /**
     * @Then /^I can get the hex (.*)$/
     */
    public function iCanGetTheHex($type)
    {
        if ($val = $this->color->hex() !== $type)
        {
            $this->colorException($type, $val, 'hex');
        }
    }

    /**
     * @Given /^I can get the red (.*)$/
     */
    public function iCanGetTheRed($red)
    {
        $component = $this->color->red();

        if ($component !== intval($red))
        {
            $this->colorException($red, $component, 'red');
        }
    }

    /**
     * @Given /^I can get the green (.*)$/
     */
    public function iCanGetTheGreen($green)
    {
        $component = $this->color->green();

        if ($component !== intval($green))
        {
            $this->colorException($green, $component, 'green');
        }
    }

    /**
     * @Given /^I can get the blue (.*)$/
     */
    public function iCanGetTheBlue($blue)
    {
        $component = $this->color->blue();

        if ($component !== intval($blue))
        {
            $this->colorException($blue, $component, 'blue');
        }
    }

    /**
     * @Given /^I can get the hue (.*)$/
     */
    public function iCanGetTheHue($hue)
    {
        $component = $this->color->hue();

        if ($component !== intval($hue))
        {
            $this->colorException($hue, $component, 'hue');
        }
    }

    /**
     * @Given /^I can get the saturation (.*)$/
     */
    public function iCanGetTheSaturation($saturation)
    {
        $component = $this->color->saturation();

        if ($component !== intval($saturation))
        {
            $this->colorException($saturation, $component, 'saturation');
        }
    }

    /**
     * @Given /^I can get the lightness (.*)$/
     */
    public function iCanGetTheLightness($lightness)
    {
        $component = $this->color->lightness();

        if ($component !== intval($lightness))
        {
            $this->colorException($lightness, $component, 'lightness');
        }
    }

    private function colorException($expected, $received, $type)
    {
        throw new Exception(sprintf("Colors value of %s is incorrect\nExpected: %s\nReceived: %s", $type, $expected, $received));
    }
}
