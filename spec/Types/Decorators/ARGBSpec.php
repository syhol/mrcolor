<?php

namespace spec\MrColor\Types\Decorators;

use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ARGBSpec
 * @package spec\MrColor\Types\Decorators
 */
class ARGBSpec extends ObjectBehavior
{
    function let(Hex $hex)
    {
        $this->beConstructedWith($hex);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Decorators\ARGB');
    }

    function it_should_convert_to_argb_string(Hex $hex)
    {
        $hex->getAttribute('hex')->willReturn('FFFFFF');
        $hex->getAttribute('alpha')->willReturn(0.5);

        $this->__toString()->shouldBe('#80FFFFFF');
    }

    function it_should_convert_argb_to_json(Hex $hex)
    {
        $hex->getAttribute('hex')->willReturn('FFFFFF');
        $hex->getAttribute('alpha')->willReturn(0.5);

        $this->toJson()->shouldBe(json_encode(['argb' => '#80FFFFFF', 'css' => '#80FFFFFF']));
    }

    function it_should_add_an_alpha_level(Hex $hex)
    {
        $hex->alpha(50)->willReturn($this);

        $this->beConstructedWith($hex);

        $this->alpha(50)->shouldBe($this);
    }

    function it_should_keep_chain_of_responsibility(RGB $rgb, HSL $hsl, Hex $hex)
    {
        $hex->getAttribute('alpha')->willReturn(1);

        $hex->toHsl()->willReturn($hsl);
        $hex->toRgb()->willReturn($rgb);
        $hex->toHex()->willReturn($hex);

        $this->beConstructedWith($hex);

        $this->toHsl()->shouldHaveType(HSL::class);
        $this->toRgb()->shouldHaveType(RGB::class);
        $this->toHex()->shouldHaveType(Hex::class);
    }
}
