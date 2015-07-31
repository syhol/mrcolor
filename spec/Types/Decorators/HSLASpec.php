<?php

namespace spec\MrColor\Types\Decorators;

use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class HSLASpec
 * @package spec\MrColor\Types\Decorators
 */
class HSLASpec extends ObjectBehavior
{
    function let(HSL $type)
    {
        $this->beConstructedWith($type);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Decorators\HSLA');
    }

    function it_should_convert_to_hsla_string(HSL $hsl)
    {
        $hsl->getValues()->willReturn([10,20,30]);
        $hsl->getAttribute('alpha')->willReturn(0.5);

        $this->beConstructedWith($hsl);

        $this->__toString()->shouldBe('hsla(10, 20%, 30%, 0.5)');
    }

    function it_should_convert_hsla_to_json(HSL $hsl)
    {
        $hsl->getValues()->willReturn([10,20,30]);
        $hsl->getAttribute('alpha')->willReturn(0.5);

        $this->beConstructedWith($hsl);

        $this->toJson()->shouldBe(json_encode(['hsla' => [10,20,30,0.5], 'css' => 'hsla(10, 20%, 30%, 0.5)']));
    }

    function it_should_add_an_alpha_level(HSL $hsl)
    {
        $hsl->alpha(50)->willReturn($this);

        $this->beConstructedWith($hsl);

        $this->alpha(50)->shouldBe($this);
    }

    function it_should_keep_chain_of_responsibility(RGB $rgb, HSL $hsl, Hex $hex)
    {
        $hsl->getAttribute('alpha')->willReturn(1);

        $hsl->toHsl()->willReturn($hsl);
        $hsl->toRgb()->willReturn($rgb);
        $hsl->toHex()->willReturn($hex);

        $this->beConstructedWith($hsl);

        $this->toHsl()->shouldHaveType(HSL::class);
        $this->toRgb()->shouldHaveType(RGB::class);
        $this->toHex()->shouldHaveType(Hex::class);
    }
}
