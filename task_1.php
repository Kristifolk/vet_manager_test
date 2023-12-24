<?php
//1*.puzzle 2. Задание 1
//Напишите функцию divisible_by_three(int $max, int $min): array, которая формирует убывающий массив от $max и до $min из чисел,
//которые делятся на 3 без отстатка. В тестах проверьте что первый, последний и любой некрайний элемент списка действительно
// делятся на 3. Например для three_devided_range(1002, 0) вернет массив [1002, 999, ... 0]

//error_reporting(E_ALL);//показывать ошибки
//ini_set('display_errors', 1);

function without_remainder(int $number, int $remainder): bool
{
    return $number % $remainder === 0;//остаток от деления равен 0
}

function divisible_by_three(int $max, int $min): array
{
    $array = [];

    if (is_int($max) && is_int($min)) {

        for ($max; $max >= $min; $max--) {
            if (without_remainder($max, 3)) {
                array_push($array, $max);//делится на 3 без остатка, пишу в массив
            }
        }
    }
    return $array;
}

$max = 1002;
$min = 0;

$three_devided_range = divisible_by_three($max, $min);
//$three_devided_range = divisible_by_three(1002, 0);
echo json_encode($three_devided_range);// при $max = 1002, $min = 0 вернет массив вида [1002, 999, ... 0]


assert(without_remainder(reset($three_devided_range), 3));//Первый элемент массива делится на 3
assert(without_remainder(end($three_devided_range), 3));//Последний элемент массива делится на 3

if (isset($three_devided_range[3])) {//i-элемент, проверка на существование этого элемента в массиве
    assert(without_remainder($three_devided_range[3], 3));
}

assert(divisible_by_three(9, 0) === [9, 6, 3, 0]);

assert(divisible_by_three(2, 1) === []);//пустой массив, если в $max, $min нет чисел которые делятся на 3
assert(empty(divisible_by_three(2, 1)));//пустой массив, если в $max, $min нет чисел которые делятся на 3

assert(divisible_by_three(0, 9) === []);//пустой массив, при $max = 0, $min = 9 в убывающем массиве нет чисел которые делятся на 3
assert(empty(divisible_by_three(0, 9))); //пустой массив, эта запись наверно


assert(divisible_by_three(0, -9) === [0, -3, -6, -9]);//при $max = 0, $min = -9 в убывающем массиве есть числа которые делятся на 3
assert(divisible_by_three(0, 0) === [0]);
assert(is_int($max) && is_int($min) && is_array(divisible_by_three($max, $min))); //принимает число и вернет массив . Или надо отдельно проверку аргументов функции  и возращаемого типа
assert(is_int($max) && is_int($min));//принимает число без перевода из строки в число
assert(is_array(divisible_by_three($max, $min)));//вернет массив
assert(is_int(9) && is_int(0) && is_array(divisible_by_three(9, 0))); //принимает число  и вернет массив

//не получается
//assert(empty(divisible_by_three("f", 0)));//пустой массив, аргументы не могут быть строкой
//assert(empty(divisible_by_three("9", 0)));//пустой массив, число без перевода из строки в число
//еще можно проверить $max = 9.9;$min = 3.3; принудительно округлять до целого или пустой массив


?>
