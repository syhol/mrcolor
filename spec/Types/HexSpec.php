<?php

namespace spec\MrColor\Types;

use MrColor\Types\Hex;
use MrColor\Types\HSLA;
use MrColor\Types\RGBA;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HexSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('#EEEEEE');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Hex');
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->hex()->shouldHaveType(Hex::class);
        $this->hex()->shouldBe($this);
    }

    function it_should_return_hsla_when_converted()
    {
        $this->hsl()->shouldHaveType(HSLA::class);
    }

    function it_should_return_rgba_when_converted()
    {
        $this->rgb()->shouldHaveType(RGBA::class);
    }

    function it_should_convert_to_string()
    {
        $this->__toString()->shouldBe('#EEEEEE');
    }

    function it_should_convert_to_json()
    {
        $this->toJson()->shouldBe(json_encode(['hex' => '#EEEEEE']));
    }
}
