<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RgbToHslSpec
 * @package spec\MrColor\Types\Transformers
 */
class RgbToHslSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Transformers\RgbToHsl');
    }

    function it_should_convert(ColorType $colorType)
    {
        $colorType->getAttribute('red')->willReturn(255);
        $colorType->getAttribute('green')->willReturn(255);
        $colorType->getAttribute('blue')->willReturn(255);
        $colorType->getAttribute('alpha')->willReturn(null);

        $this->convert($colorType)->shouldBeArray();
        $this->convert($colorType)->shouldBe([0,0,100]);
    }

    function it_should_convert_with_alpha(ColorType $colorType)
    {
        $colorType->getAttribute('red')->willReturn(255);
        $colorType->getAttribute('green')->willReturn(255);
        $colorType->getAttribute('blue')->willReturn(255);
        $colorType->getAttribute('alpha')->willReturn(0.5);

        $this->convert($colorType)->shouldBeArray();
        $this->convert($colorType)->shouldBe([0,0,100,0.5]);
    }
}
