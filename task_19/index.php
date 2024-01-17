<?php
// ### Абстрактные классы, Интерфейсы, Пространства имен  (6 часов)
/* 19.
Создать абстрактный класс Figure в пространстве имен My\Abstract
с методами вычисления площади и периметра, а также методом, выводящим
информацию о фигуре на экран(Тип, Площадиь и периметр).
Создать производные классы в пространстве имен My\Concrete\: Rectangle (прямоугольник),
Circle (круг), Triangle (треугольник) со своими методами вычисления площади и периметра.
Создать массив n фигур и вывести полную информацию о фигурах на экран.
*/
require_once __DIR__ . '/vendor/autoload.php';//подключить автозагрузчик

use My\Concrete\Rectangle as Rectangle;
use My\Concrete\Triangle as Triangle;
use My\Concrete\Circle as Circle;


$rectangle = new Rectangle(5, 10);
$rectangle->DisplayInformation();

$triangle = new Triangle(4, 7, 10, 5);
$triangle->DisplayInformation();

$circle = new Circle(8);
$circle->DisplayInformation();