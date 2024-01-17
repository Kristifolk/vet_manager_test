/*
https://onlinephp.io/c/2ec28
*/

<?php
/* 17. puzzle 1. Задание 4
Написать функцию only_odd, которая принимает массив [1, 2, 3] и возвращает массив только нечетных [1, 3]
*/

$arr = [1, 1, 1];
function without_remainder(int $number, int $remainder): bool
{
    return $number % $remainder === 0;
}

//решение 1
function only_odd(array $arr): array
{
    $arrayOdd = [];
    foreach ($arr as $item) {
        if (is_int($item)) {
            if (!without_remainder($item, 2)) {
                $arrayOdd[] = $item;
            }
        }
    }
    return $arrayOdd;
}

/*
 //решение 2
function only_odd(array $arr): array
{
//array_filter — Фильтрует элементы исходного массива с помощью callback-функции
    $filteredValues = array_filter($arr, function ($item) {
        return is_int($item) && !without_remainder($item, 2);
    });
//array_values() Возвращает все значения массива
    $arrayOdd = array_values($filteredValues);
    return $arrayOdd;
}
*/

$result = only_odd($arr);

if (empty($result)) {
    echo "В исходном массиве отсутствуют нечетные числа, массив пустой или в массиве строковые значения";
} else {
    if (is_array($result)) {
        echo json_encode($result);//вернет массив вида [1, 3, ... 7]

    } else {
        //  обработку ошибки
    }
}

assert(array_values(only_odd([1, 2, 3])) === [1, 3], "Ожидается,что функция вернет массив нечетных чисел");
assert(array_values(only_odd([1, 2, 3, 4, 5, 6, 7])) === [1, 3, 5, 7], "Ожидается,что функция вернет массив нечетных чисел");
assert(count(only_odd([])) === 0, "Ожидается,что функция вернет массив нечетных чисел. В исходном массиве нет нечетных чисел");
assert(only_odd([2, 2, 4, 12, 888]) === [], "Ожидается,что функция вернет массив нечетных чисел. В исходном массиве нет нечетных чисел");
assert(is_array(only_odd([1, 2, 3])), "Ожидается,что функция вернет массив");
assert(is_array([1, 2, 3]) && is_array(only_odd([1, 2, 3])), "Ожидается передача массива в качестве аргумента функции и что функция вернет массив");
assert(is_array($arr) && is_array(only_odd($arr)), "Ожидается передача массива в качестве аргумента функции и что функция вернет массив");
assert(only_odd([1, 2, "3"]) === [1],"Ожидается,что функция вернет массив нечетных чисел. Если передать строку, то функция её не отфильтрует");
assert(only_odd([1, "g", 4]) === [1], "Ожидается,что функция вернет массив нечетных чисел. Если передать строку, то функция её не отфильтрует");
assert(only_odd([4, "3", "7"]) === [], "Ожидается,что функция вернет массив нечетных чисел. Если передать строку, то функция её не отфильтрует");
assert(only_odd([4, "g", "1"]) === [], "Ожидается,что функция вернет массив нечетных чисел. Если передать строку, то функция её не отфильтрует");
assert(only_odd([[1, 3, 7]]) === [], "Ожидается передача одномерного массива в качестве аргумента функции");
