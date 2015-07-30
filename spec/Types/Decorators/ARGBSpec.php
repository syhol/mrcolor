<?php

namespace spec\MrColor\Types\Decorators;

use MrColor\Types\Hex;
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
}
