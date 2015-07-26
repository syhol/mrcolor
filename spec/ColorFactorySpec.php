<?php

namespace spec\MrColor;

use MrColor\Color;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ColorFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\ColorFactory');
    }

    function it_creates_a_new_hex_color()
    {
        $this->hex('#eeeeee')->shouldHaveType(Color::class);
    }

    function it_creates_a_new_rgb_color()
    {
        $this->rgb(20,30,40)->shouldHaveType(Color::class);
    }

    function it_creates_a_new_hsl_color()
    {
        $this->hsl(220, 0.9, 1)->shouldHaveType(Color::class);
    }

    function it_creates_a_new_rgba_color()
    {
        $this->rgb(20, 30, 40, 0.5)->shouldHaveType(Color::class);
    }

    function it_creates_a_new_hsla_color()
    {
        $this->hsl(220, 0.9, 1, 0.5)->shouldHaveType(Color::class);
    }
}
