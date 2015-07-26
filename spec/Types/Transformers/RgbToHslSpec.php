<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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

        $this->convert($colorType)->shouldBe([0,0,100]);
    }
}
