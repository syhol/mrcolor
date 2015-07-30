<?php

namespace spec\MrColor\Types\Transformers;

use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class HexToRgbSpec
 * @package spec\MrColor\Types\Transformers
 */
class HexToRgbSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Transformers\HexToRgb');
    }

    function it_should_convert(ColorType $colorType)
    {
        $colorType->getAttribute('hex')->willReturn('#FFFFFF');

        $this->convert($colorType)->shouldBeArray();
        $this->convert($colorType)->shouldBe([255,255,255]);
    }
}
