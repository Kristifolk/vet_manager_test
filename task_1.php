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


assert(without_remainder(reset($three_devided_range), 3), "Ожидается, что первый элемент массива делится на 3");
assert(without_remainder(end($three_devided_range), 3), "Ожидается, что последний элемент массива делится на 3");

if (isset($three_devided_range[3])) {
    assert(without_remainder($three_devided_range[3], 3), "Ожидается, что 3 элемент массива делится на 3, при условии что он существует");
}

assert(divisible_by_three(9, 0) === [9, 6, 3, 0], "Ожидается, что функция формирует убывающий массив от 9 и до 0 из чисел, которые делятся на 3 без отстатка");

assert(divisible_by_three(2, 1) === [], "Ожидается, что функция вернет пустой массив, если в 'max', 'min' нет чисел которые делятся на 3");
assert(empty(divisible_by_three(2, 1)), "Ожидается, что функция вернет пустой массив, если в 'max', 'min' нет чисел которые делятся на 3");

assert(divisible_by_three(0, 9) === [], "Ожидается, что функция вернет пустой массив, если  'max' = 0, 'min' = 9 в убывающем массиве нет чисел которые делятся на 3");
assert(empty(divisible_by_three(0, 9)), "Ожидается, что функция вернет пустой массив, если  'max' = 0, 'min' = 9 в убывающем массиве нет чисел которые делятся на 3");


assert(divisible_by_three(0, -9) === [0, -3, -6, -9], "Ожидается, что функция формирует убывающий массив от 0 и до -9 из чисел, которые делятся на 3 без отстатка");
assert(divisible_by_three(0, 0) === [0], "Ожидается, что функция при формировании убывающего массива от 0 и до 0 вернет массив из одного элемента [0]");
assert(is_int($max) && is_int($min) && is_array(divisible_by_three($max, $min)), "Ожидается передача чисел в качестве аргументов функции и что функция вернет массив");
assert(is_int(9) && is_int(0) && is_array(divisible_by_three(9, 0)), "Ожидается передача чисел в качестве аргументов функции и что функция вернет массив");

//не получается
//assert(empty(divisible_by_three("f", 0)));//пустой массив, аргументы не могут быть строкой
//assert(empty(divisible_by_three("9", 0)));//пустой массив, число без перевода из строки в число
//еще можно проверить $max = 9.9;$min = 3.3; принудительно округлять до целого или пустой массив


?>
