<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RgbToHexSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Transformers\RgbToHex');
    }

    function it_should_convert(ColorType $colorType)
    {
        $colorType->getAttribute('red')->willReturn(255);
        $colorType->getAttribute('green')->willReturn(255);
        $colorType->getAttribute('blue')->willReturn(255);

        $this->convert($colorType)->shouldBe(['#FFFFFF']);
    }
}
