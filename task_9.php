<?php
//И еще на ООП:
//9. задание 2. Создать интерфейс Operation с методом calculate. Создать классы имплементирующие
//этот интерфейс(Plus, Minus, Mult, Div), каждый класс в конструктор принимает 2 числа и каждый
//класс реализует метод calculate по-своему. Создайте класс Calculator устроенный согласно
//шаблоны Fluent interface. Сделайте так, чтобы код из примера заработал. Допишите своих тестов.
//$calculator = new Calculator();
//assert(
//    $calculator->firstNumber(2)
//        ->secondNumber(2)
//        ->operation(Mult::class)
//        ->result() == 4
//);
interface Operation
{
    public function calculate();//абстракция для различных операций
}

class Plus implements Operation
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function calculate()
    {
        return $this->a + $this->b;
    }
}

class Minus implements Operation
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function calculate()
    {
        return $this->a - $this->b;
    }
}

class Mult implements Operation
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function calculate()
    {
        return $this->a * $this->b;
    }
}

class Div implements Operation
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function calculate()
    {
        if ($this->b == 0) {
            throw new InvalidArgumentException("На ноль нельзя делить!");
        }
        return $this->a / $this->b;
    }
}

// Класс Calculator с поддержкой Fluent interface
class Calculator
{
    private $firstNumber;
    private $secondNumber;
    private $operation;

    public function firstNumber($num)
    {
        $this->firstNumber = $num;
        return $this;
    }

    public function secondNumber($num)
    {
        $this->secondNumber = $num;
        return $this;
    }

    public function operation($operation)
    {
        $this->operation = new $operation($this->firstNumber, $this->secondNumber);
        return $this;
    }

    public function result()
    {
        if (!$this->operation || !($this->operation instanceof Operation) ||
            !isset($this->firstNumber) || !isset($this->secondNumber)) {
            throw new InvalidArgumentException("Неверная операция или число");
        }

        return $this->operation->calculate();
    }
}

$calculator = new Calculator();
assert(
    $calculator->firstNumber(2)
        ->secondNumber(2)
        ->operation(Mult::class)
        ->result() == 4
);


$calculator = new Calculator();
assert(
    $calculator->firstNumber(2)
        ->secondNumber(2)
        ->operation(Div::class)
        ->result() == 1
);

$calculator = new Calculator();
try {//код, который может вызвать исключение
    $result = $calculator->firstNumber(2)
        ->secondNumber(0)
        ->operation(Div::class)
        ->result();

    echo "Результат: " . $result;
} catch (InvalidArgumentException $e) {//обработка исключения
    echo "Ошибка: " . $e->getMessage();
}


//код, который может вызвать исключение. Если исключение происходит внутри блока  try , выполнение кода в блоке  try  прерывается, и управление передается в блок  catch , где можно обработать исключение

