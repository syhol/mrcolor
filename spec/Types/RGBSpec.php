<?php

namespace spec\MrColor\Types;

use MrColor\Types\Hex;
use MrColor\Types\RGB;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RGBSpec
 * @package spec\MrColor\Types
 */
class RGBSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(0, 0, 0);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RGB::class);
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->rgb()->shouldHaveType(RGB::class);
    }

    function it_should_return_hex_when_converted()
    {
        $this->hex()->shouldHaveType(Hex::class);
    }

    function it_should_return_rgba_when_converted()
    {
        $this->rgb()->shouldHaveType(RGB::class);
    }

    function it_should_convert_to_rgb_string()
    {
        $this->__toString()->shouldBe('rgb(0, 0, 0)');
    }

    function it_should_convert_rgb_to_json()
    {
        $this->toJson()->shouldBe(json_encode(['rgb' => [0,0,0], 'css' => 'rgb(0, 0, 0)']));
    }
}
