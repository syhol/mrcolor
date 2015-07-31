<?php

namespace spec\MrColor;

use MrColor\ColorFactory;
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

    function it_gets_a_red_value(ColorType $colorType)
    {
        $colorType->getAttribute('red')->willReturn(255);
        $colorType->toRgb()->willReturn($colorType);

        $this->red()->shouldBe(255);
    }

    function it_gets_a_green_value(ColorType $colorType)
    {
        $colorType->getAttribute('green')->willReturn(200);
        $colorType->toRgb()->willReturn($colorType);

        $this->green()->shouldBe(200);
    }

    function it_gets_a_blue_value(ColorType $colorType)
    {
        $colorType->getAttribute('blue')->willReturn(100);
        $colorType->toRgb()->willReturn($colorType);

        $this->blue()->shouldBe(100);
    }

    function it_gets_the_hue(ColorType $colorType)
    {
        $colorType->getAttribute('hue')->willReturn(0.3);
        $colorType->toHsl()->willReturn($colorType);

        $this->hue()->shouldBe(intval(0.3 * 360));
    }

    function it_gets_the_saturation(ColorType $colorType)
    {
        $colorType->getAttribute('saturation')->willReturn(0.2);
        $colorType->toHsl()->willReturn($colorType);

        $this->saturation()->shouldBe(intval(0.2 * 100));
    }

    function it_gets_the_lightness(ColorType $colorType)
    {
        $colorType->getAttribute('lightness')->willReturn(0.7);
        $colorType->toHsl()->willReturn($colorType);

        $this->lightness()->shouldBe(intval(0.7 * 100));
    }

    function it_creates_a_pallet(PalletInterface $pallet)
    {
        $this->makePallet($pallet);
    }
}
