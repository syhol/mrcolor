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
        $this->beConstructedWith(0, 0, 0);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\RGBA');
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->rgb()->shouldHaveType(RGBA::class);
    }

    function it_should_return_hex_when_converted()
    {
        $this->hex()->shouldHaveType(Hex::class);
    }

    function it_should_return_rgba_when_converted()
    {
        $this->rgb()->shouldHaveType(RGBA::class);
    }

    function it_should_convert_to_rgb_string()
    {
        $this->__toString()->shouldBe('rgb(0, 0, 0)');
    }

    function it_should_convert_to_rgba_string()
    {
        $this->beConstructedWith(10,20,30,0.5);

        $this->__toString()->shouldBe('rgba(10, 20, 30, 0.5)');
    }

    function it_should_convert_rgb_to_json()
    {
        $this->toJson()->shouldBe(json_encode(['rgb' => [0,0,0], 'css' => 'rgb(0, 0, 0)']));
    }

    function it_should_convert_rgba_to_json()
    {
        $this->beConstructedWith(10,20,30,0.5);

        $this->toJson()->shouldBe(json_encode(['rgb' => [10,20,30,0.5], 'css' => 'rgba(10, 20, 30, 0.5)']));
    }
}
