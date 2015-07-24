<?php

namespace spec\MrColor\Types\Transformers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RgbToHexSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Types\Transformers\RgbToHex');
    }
}
