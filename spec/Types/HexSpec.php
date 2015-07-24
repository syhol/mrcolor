<?php

namespace spec\MrColor\Types;

use MrColor\Types\Hex;
use MrColor\Types\HSLA;
use MrColor\Types\RGBA;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HexSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Hex');
    }

    function let()
    {
        $this->beConstructedWith('#eeeeee');
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->toHex()->shouldHaveType(Hex::class);
    }

    function it_should_return_hsla_when_converted()
    {
        $this->toHsla()->shouldHaveType(HSLA::class);
    }

    function it_should_return_rgba_when_converted()
    {
        $this->toRgb()->shouldHaveType(RGBA::class);
    }

    function it_should_convert_to_string()
    {
        $this->__toString()->shouldBe('#eeeeee');
    }
}
