<?php

namespace spec\MrColor;

use MrColor\Pallets\PalletInterface;
use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ColorSpec extends ObjectBehavior
{
    function let(ColorType $colorType)
    {
        $this->beConstructedWith($colorType);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Color');
    }

    function it_gets_string_representation(ColorType $colorType)
    {
        $colorType->__toString()->willReturn('#EEEEEE');

        $this->__toString()->shouldBe('#EEEEEE');
    }

    function it_converts_to_hex(ColorType $colorType)
    {
        $colorType->hex()->willReturn($colorType);

        $this->toHex()->shouldBe($this);
    }

    function it_converts_to_rgb(ColorType $colorType)
    {
        $colorType->rgb()->willReturn($colorType);

        $this->toRgb()->shouldBe($this);
    }

    function it_converts_to_hsl(ColorType $colorType)
    {
        $colorType->hsl()->willReturn($colorType);

        $this->toHsl()->shouldBe($this);
    }

    function it_converts_to_argb(ColorType $colorType)
    {
        $colorType->argb()->willReturn($colorType);

        $this->toArgb()->shouldBe($this);
    }

    function it_converts_to_hsla(ColorType $colorType)
    {
        $colorType->hsla()->willReturn($colorType);

        $this->toHsla()->shouldBe($this);
    }

    function it_converts_to_rgba(ColorType $colorType)
    {
        $colorType->rgba()->willReturn($colorType);

        $this->toRgba()->shouldBe($this);
    }

    function it_adds_alpha_levels_to_colortype(ColorType $colorType)
    {
        $colorType->alpha(50);

        $this->alpha(50)->shouldBe($this);
    }

    function it_creates_a_pallet(PalletInterface $pallet)
    {
        $this->makePallet($pallet);
    }
}
