<?php

namespace My\Concrete;

use My\Abstract\Figure;

class Rectangle extends Figure
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function CalculateArea(): float
    {
        return $this->width * $this->height;
    }

    public function CalculatePerimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }
}