<?php

namespace spec\MrColor\Types\Decorators;

use MrColor\Types\Hex;
use MrColor\Types\HSL;
use MrColor\Types\RGB;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RGBASpec
 * @package spec\MrColor\Types\Decorators
 */
class RGBASpec extends ObjectBehavior
{
    function let(RGB $type)
    {
        $this->beConstructedWith($type);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Decorators\RGBA');
    }

    function it_should_convert_to_rgba_string(RGB $rgb)
    {
        $rgb->getValues()->willReturn([10,20,30]);
        $rgb->getAttribute('alpha')->willReturn(0.5);

        $this->beConstructedWith($rgb);

        $this->__toString()->shouldBe('rgba(10, 20, 30, 0.5)');
    }

    function it_should_convert_rgba_to_json(RGB $rgb)
    {
        $rgb->getValues()->willReturn([10,20,30]);
        $rgb->getAttribute('alpha')->willReturn(0.5);

        $this->beConstructedWith($rgb);

        $this->toJson()->shouldBe(json_encode(['rgba' => [10,20,30,0.5], 'css' => 'rgba(10, 20, 30, 0.5)']));
    }

    function it_should_add_an_alpha_level()
    {
        $this->alpha(50)->shouldBe($this);
    }

    function it_should_keep_chain_of_responsibility(RGB $rgb, HSL $hsl, Hex $hex)
    {
        $rgb->getAttribute('alpha')->willReturn(1);

        $rgb->hsl()->willReturn($hsl);
        $rgb->rgb()->willReturn($rgb);
        $rgb->hex()->willReturn($hex);

        $this->beConstructedWith($rgb);

        $this->hsl()->shouldHaveType(HSL::class);
        $this->rgb()->shouldHaveType(RGB::class);
        $this->hex()->shouldHaveType(Hex::class);
    }
}
