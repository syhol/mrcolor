<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RgbToHexSpec
 * @package spec\MrColor\Types\Transformers
 */
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
        $colorType->getAttribute('alpha')->willReturn(null);

        $this->convert($colorType)->shouldBe(['#FFFFFF']);
    }

    function it_should_convert_with_alpha(ColorType $colorType)
    {
        $colorType->getAttribute('red')->willReturn(255);
        $colorType->getAttribute('green')->willReturn(255);
        $colorType->getAttribute('blue')->willReturn(255);
        $colorType->getAttribute('alpha')->willReturn(0.5);

        $this->convert($colorType)->shouldBe(['#FFFFFF', 0.5]);
    }
}
