<?php

namespace My\Abstract;

abstract class Figure
{
    abstract public function calculateArea(): float;

    abstract public function calculatePerimeter(): float;

    //а также методом, выводящим информацию о фигуре на экран(Тип, Площадиь и периметр).
    public function displayInformation()
    {
        echo "Type: " . static::class . "\n"; //static::class для получения полного имени класса, в котором оно было вызвано
        echo "Area: " . $this->calculateArea() . "\n";
        echo "Perimeter: " . $this->calculatePerimeter() . "\n";
    }
}

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

    public function calculateArea(): float
    {
        return $this->width * $this->height;
    }

    public function calculatePerimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }
}

namespace My\Concrete;

use My\Abstract\Figure;

class Circle extends Figure
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return pi() * pow($this->radius, 2);//пr2
    }

    public function calculatePerimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}


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
        return ($this->heightA * $this->a) / 2;
    }

    public function calculatePerimeter(): float
    {
        return $this->a * $this->b * $this->c;
    }

}


$rectangle = new Rectangle(5, 10);
$rectangle->displayInformation();

$triangle = new Triangle(4, 7, 10, 5);
$triangle->displayInformation();

$circle = new Circle(8);
$circle->displayInformation();
