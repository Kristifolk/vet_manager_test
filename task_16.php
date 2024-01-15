/*
https://onlinephp.io/c/a49ae
*/


<?php
/* 16. puzzle 1. Задание 3
Написать функцию array_double, которая принимает на вход массив чисел, например [1,2,3] и
 возвращает массив, в котором все числа умножены на 2, например [2, 4, 6]
*/

$arr = [1, 2, 3];

function array_double(array $arr): array
{
    $res_arr = [];
    for ($i = 0; $i < count($arr); $i++) {
        if (is_int($arr[$i])) {
          $res_arr[] = $arr[$i] * 2;
        }
    }
    return $res_arr;
}

$result = array_double($arr);
print_r($result);


assert(array_double([1, 2, 3]) === [2, 4, 6]);
assert(array_double([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) === [2, 4, 6, 8, 10, 12, 14, 16, 18, 20]);
assert(array_double([]) === []); // Пустой массив
assert(is_array([1, 2, 3]) && is_array(array_double([2, 4, 6]))); //принимает массив и вернет массив
assert(is_array($arr) && is_array(array_double($arr))); //принимает массив и вернет массив
assert(array_double([1, 2, "3"]) === [2, 4]);//массив  числ и строк  без перевода из строки в число
assert(array_double([1, "i", "3"]) === [2]);//массив  числ и строк  без перевода из строки в число
assert(array_double([1, "i", 3]) === [2, 6]);//массив  числ и строк  без перевода из строки в число
assert(array_double(["1", "i", "3"]) === []);//массив  числ и строк  без перевода из строки в число
assert(array_double([[1, 2, 3]]) === []); // Пустой массив вернет принимает двумерный массив
