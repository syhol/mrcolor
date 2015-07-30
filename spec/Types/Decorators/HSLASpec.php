<?php

namespace spec\MrColor\Types\Decorators;

use MrColor\Types\HSL;
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
}
