<?php

namespace My\Abstract;

abstract class Figure
{
    abstract public function CalculateArea(): float;

    abstract public function CalculatePerimeter(): float;

    //а также методом, выводящим информацию о фигуре на экран(Тип, Площадиь и периметр).
    public function DisplayInformation()
    {
        echo "Type: " . static::class . "\n"; //static::class для получения полного имени класса, в котором оно было вызвано
        echo "Area: " . $this->CalculateArea() . "\n";
        echo "Perimeter: " . $this->CalculatePerimeter() . "\n";
    }
}