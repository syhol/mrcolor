<?php

namespace spec\MrColor\Types;

use MrColor\Types\Hex;
use MrColor\Types\RGBA;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RGBASpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(0, 0, 0, 1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\RGBA');
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->toRgb()->shouldHaveType(RGBA::class);
    }

    function it_should_return_hex_when_converted()
    {
        $this->toHex()->shouldHaveType(Hex::class);
    }

    /*function it_should_return_rgba_when_converted()
    {
        $this->toRgb()->shouldHaveType(RGBA::class);
    }*/

    function it_should_convert_to_string()
    {
        $this->__toString()->shouldBe('rgba(0, 0, 0, 1)');
    }
}
