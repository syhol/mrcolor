<?php

namespace MrColor\Types\Decorators;

use Illuminate\Contracts\Support\Jsonable;
use MrColor\Types\RGB;
use MrColor\Types\TypeInterface;

/**
 * Class RGBA
 * @package MrColor\Types\Decorators
 */
class RGBA implements TypeInterface, Jsonable
{
    /**
     * @var int
     */
    protected $alpha;

    /**
     * @var RGB
     */
    protected $RGB;

    /**
     * @param RGB $RGB
     */
    public function __construct(RGB $RGB)
    {
        $this->RGB = $RGB;

        $this->alpha = $RGB->getAttribute('alpha');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        list($red, $green, $blue) = $this->RGB->getValues();

        $alpha = $this->RGB->getAttribute('alpha');

        return "rgba($red, $green, $blue, $alpha)";
    }

    /**
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        $values = $this->RGB->getValues();

        $values[] = $this->RGB->getAttribute('alpha');

        return json_encode(['rgba' => $values, 'css' => $this->__toString()], $options);
    }

    /**
     * @param int $alpha
     *
     * @return $this
     */
    public function alpha($alpha = 100)
    {
        $this->RGB->alpha($alpha);

        return $this;
    }

    /**
     * Maintain chain of responsibility with decorated class
     *
     * @param       $method
     * @param array $args
     *
     * @return mixed
     */
    public function __call($method, $args = [])
    {
        if ($method === "rgba") return $this;

        return call_user_func_array([$this->RGB, $method], $args);
    }
}
