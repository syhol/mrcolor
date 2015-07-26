<?php

namespace spec\MrColor\Pallets;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MaterialDesignSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MrColor\Pallets\MaterialDesign');
    }
}
