<?php
//2*. puzzle 2. Задание 2
//Напишите функцию count_even(array $arr): int, которая считает количество четных чисел в массиве и возвращает их количество.
// В массиве [1, 2, 3] - только 1 четный элемент, функция вернет 1.

$arr = [1, 2, 3];

function without_remainder(int $number, int $remainder): bool
{
    return $number % $remainder === 0; //остаток от деления равен 0, значит четное
}

function count_even(array $arr): int
{
    $count_even_numbers = 0;
    foreach ($arr as $item) {
        if (is_int($item)) {
            if (without_remainder($item, 2)) {
                $count_even_numbers++;
            }
        }
    }
    return $count_even_numbers;
}

$result = count_even($arr);

if ($result === 0) {
    echo "В исходном массиве нет четных чисел, массив пустой или в массиве строковые значения";
} else if (is_int($result)) {
    echo "Всего в массиве [" . implode(", ", $arr) . "] четных чисел: $result";
} else {
    //  обработку ошибки

}

assert(count_even([1, 2, 3]) === 1);
assert(count_even([1, 2, 3, 4, 5, 6, 7]) === 3); //  у нас четные это 2, 4, 6
assert(count_even([]) === 0); // Пустой массив
assert(count_even([1, 3, 5, 7, 9]) === 0);// Массив без четных
assert(is_int(count_even([1, 2, 3]))); //вернет число
assert(is_array([1, 2, 3]) && is_int(count_even([1, 2, 3]))); //принимает массив и вернет число
assert(is_array($arr) && is_int(count_even($arr))); //принимает массив и вернет число

assert(count_even([1, 2, "2"]) === 1);//массив с одним четным числом без перевода из строки в число
assert(count_even([1, "g", 4]) === 1); // массив с одним четным числом
assert(count_even([1, "2", "4"]) === 0); //  Массив без четных чисел без перевода из строки в число
assert(count_even([1, "g", "4"]) === 0); //  Массив без четных чисел без перевода из строки в
