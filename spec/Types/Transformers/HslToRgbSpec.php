<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class HslToRgbSpec
 * @package spec\MrColor\Types\Transformers
 */
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
        $colorType->getAttribute('alpha')->willReturn(null);

        $this->convert($colorType)->shouldBeArray();
        $this->convert($colorType)->shouldBe([255,255,255]);
    }

    function it_should_convert_with_alpha(ColorType $colorType)
    {
        $colorType->getAttribute('hue')->willReturn(0);
        $colorType->getAttribute('saturation')->willReturn(0);
        $colorType->getAttribute('lightness')->willReturn(1);
        $colorType->getAttribute('alpha')->willReturn(0.5);

        $this->convert($colorType)->shouldBeArray();
        $this->convert($colorType)->shouldBe([255,255,255,0.5]);
    }
}
