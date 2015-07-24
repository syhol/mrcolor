<?php

namespace spec\MrColor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ColorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Color');
    }
}
