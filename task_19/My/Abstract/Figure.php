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
        echo "Perimeter: " . $this->alculatePerimeter() . "\n";
    }
}