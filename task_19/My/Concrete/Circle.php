<?php

namespace My\Concrete;

use My\Abstract\Figure;

class Circle extends Figure
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function CalculateArea(): float
    {
        return pi() * pow($this->radius, 2);//пr2
    }

    public function CalculatePerimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}