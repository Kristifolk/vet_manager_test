<?php
//3*. puzzle 2. Задание 3
//Напишите функцию min_even(array $arr): int, Найдите наименьший четный(по значению) элемент массива.
//В массиве [1, 2, 3, 4] - 2 наименьший четный элемент.
$arr = [1, 2, 3, 4];

function without_remainder(int $number, int $remainder): bool
{
    return $number % $remainder === 0; //остаток от деления равен 0, значит четное
}

function min_even(array $arr): int
{
    $min_even_element = PHP_INT_MAX; // Используем максимальное целое положительное как начальное значение
    foreach ($arr as $item) {
        if (is_int($item)) {
            if (without_remainder($item, 2)) {
                if ($item <= $min_even_element && $item !== 0) {
                    $min_even_element = $item; // перезаписываю  мин четное чисело
                }
            }
        }
    }
    if ($min_even_element === PHP_INT_MAX) {
        return 0;
    }
    return $min_even_element;
}

$result = min_even($arr);

if ($result === 0) {
    echo "В исходном массиве нет четных чисел, массив пустой или в массиве строковые значения";
} else if (is_int($result)) {
    echo "В массиве [" . implode(", ", $arr) . "] наименьший четный элемент: $result";
} else {
    //  обработку ошибки
}


assert(without_remainder($result, 2)); //элемент массива четный
assert(min_even([1, 2, 3, 4]) === 2);//2 наименьший четный элемент
assert(min_even([1, 2, 3, 0]) === 2);//2 наименьший четный элемент, ноль исключили
assert(min_even([]) === 0); // Пустой массив
assert(min_even([1, 3, 5, 7, 9]) === 0);// Массив без четных
assert(is_int(min_even([1, 2, 3]))); //вернет число

assert(is_array([1, 2, 3, 4]) && is_int(min_even([1, 2, 3, 4]))); //принимает массив и вернет число
assert(is_array($arr) && is_int(min_even($arr))); //принимает массив и вернет число

assert(min_even([1, 4, "2"]) === 4);//массив с одним четным числом без перевода из строки в число.НО при выводе результата строка "2" без кавычек
assert(min_even([1, "g", 4]) === 4); // массив с одним четным числом
assert(min_even([1, "2", "4"]) === 0); //  Массив без четных чисел без перевода из строки в число
assert(min_even([1, "g", "4"]) === 0); //  Массив без четных чисел без перевода из строки в число
