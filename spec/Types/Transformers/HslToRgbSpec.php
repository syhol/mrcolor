<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HslToRgbSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Transformers\HslToRgb');
    }

    function it_should_convert(ColorType $colorType)
    {
        $colorType->getAttribute('hue')->willReturn(0);
        $colorType->getAttribute('saturation')->willReturn(0);
        $colorType->getAttribute('lightness')->willReturn(1);

        $this->convert($colorType)->shouldBeArray();
        $this->convert($colorType)->shouldBe([255,255,255]);
    }
}
