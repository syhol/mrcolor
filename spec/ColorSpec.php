<?php

namespace spec\MrColor;

use MrColor\Pallets\PalletInterface;
use MrColor\Types\ColorType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ColorSpec
 * @package spec\MrColor
 */
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
        $colorType->toHex()->willReturn($colorType);

        $this->toHex()->shouldBe($this);
    }

    function it_converts_to_rgb(ColorType $colorType)
    {
        $colorType->toRgb()->willReturn($colorType);

        $this->toRgb()->shouldBe($this);
    }

    function it_converts_to_hsl(ColorType $colorType)
    {
        $colorType->toHsl()->willReturn($colorType);

        $this->toHsl()->shouldBe($this);
    }

    function it_converts_to_argb(ColorType $colorType)
    {
        $colorType->toArgb()->willReturn($colorType);

        $this->toArgb()->shouldBe($this);
    }

    function it_converts_to_hsla(ColorType $colorType)
    {
        $colorType->toHsla()->willReturn($colorType);

        $this->toHsla()->shouldBe($this);
    }

    function it_converts_to_rgba(ColorType $colorType)
    {
        $colorType->toRgba()->willReturn($colorType);

        $this->toRgba()->shouldBe($this);
    }

    function it_adds_alpha_levels_to_colortype(ColorType $colorType)
    {
        $colorType->alpha(50);

        $this->alpha(50)->shouldBe($this);
    }

   /* function it_darkens_a_color_by_a_percentage(ColorType $colorType)
    {

        $this->darken(50);
    }*/

    function it_creates_a_pallet(PalletInterface $pallet)
    {
        $this->makePallet($pallet);
    }
}
