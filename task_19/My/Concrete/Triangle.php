<?php

namespace My\Concrete;

use My\Abstract\Figure;

class Triangle extends Figure
{
    private $heightA;
    private $a;
    private $b;
    private $c;

    public function __construct($heightA, $a, $b, $c)
    {
        $this->heightA = $heightA;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calculateArea(): float
    {
        return (this->heightA * this->a) / 2;
    }

    public function calculatePerimeter(): float
    {
        return $this->a * $this->b * $this->c;
    }

}