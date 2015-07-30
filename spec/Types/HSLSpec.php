<?php

namespace spec\MrColor\Types;

use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class HSLSpec
 * @package spec\MrColor\Types
 */
class HSLSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(10, 20, 30);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HSL::class);
    }

    function it_should_return_itself_when_converted_to_itself()
    {
        $this->hsl()->shouldHaveType(HSL::class);
        $this->hsl()->shouldBe($this);
    }

    function it_should_return_hex_when_converted()
    {
        $this->hex()->shouldHaveType(Hex::class);
    }

    function it_should_return_rgba_when_converted()
    {
        $this->rgb()->shouldHaveType(RGB::class);
    }

    function it_should_convert_to_hsl_string()
    {
        $this->__toString()->shouldBe('hsl(10, 20%, 30%)');
    }

    function it_should_convert_to_hsla_string()
    {
        $this->beConstructedWith(10,20,30,0.5);

        $this->__toString()->shouldBe('hsla(10, 20%, 30%, 0.5)');
    }

    function it_should_convert_hsl_to_json()
    {
        $this->toJson()->shouldBe(json_encode(['hsl' => [10,20,30], 'css' => 'hsl(10, 20%, 30%)']));
    }

    function it_should_convert_hsla_to_json()
    {
        $this->beConstructedWith(10,20,30,0.5);

        $this->toJson()->shouldBe(json_encode(['hsl' => [10,20,30,0.5], 'css' => 'hsla(10, 20%, 30%, 0.5)']));
    }

    function it_should_add_an_alpha_level()
    {
        $this->alpha(50);
    }
}
