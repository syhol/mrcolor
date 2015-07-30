<?php

namespace spec\MrColor\Types\Decorators;

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
        $this->alpha(50);
    }
}
