<?php

namespace spec\MrColor\Types;

use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HexSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('#EEEEEE', null);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Hex');
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->toHex()->shouldHaveType(Hex::class);
        $this->toHex()->shouldBe($this);
    }

    function it_should_return_hsla_when_converted()
    {
        $this->toHsl()->shouldHaveType(HSL::class);
    }

    function it_should_return_rgba_when_converted()
    {
        $this->toRgb()->shouldHaveType(RGB::class);
    }

    function it_should_convert_to_string()
    {
        $this->__toString()->shouldBe('#EEEEEE');
    }

    function it_should_convert_to_json()
    {
        $this->toJson()->shouldBe(json_encode(['hex' => '#EEEEEE', 'css' => '#EEEEEE']));
    }

    function it_should_add_an_alpha_level()
    {
        $this->alpha(50);
    }
}
