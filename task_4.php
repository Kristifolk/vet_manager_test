<?php
//4*. puzzle 2. Задание 4
// функцию min_sum_elements(array $arr): array, которая возвращает два соседних элемента,
//сумма которых минимальна. В массиве [1, 2, 3, 4] это элементы [1, 2].
$arr = [1, 2, 3, 4];

function sum(int $a, int $b): int
{
    return $a + $b;
}

function min_sum_elements(array $arr): array
{
    $arr_min_sum = [];//массив элементов,чья сумма минимальна
    $min_sum_elements = PHP_INT_MAX;//Минимальная сумма, начальное значение установлено на максимальное целочисленное значение

    for ($key = 0; $key < count($arr) - 1; $key++) {
        $item = $arr[$key];
        $nextItem = $arr[$key + 1];

        if (is_int($item) && is_int($nextItem)) {
            $sum_elements = sum($item, $nextItem);//сумма соседних элементов

            if ($min_sum_elements === $sum_elements) {//если суммы элементов равны, то добавляем в массив
                $arr_min_sum[] = [$item, $nextItem];

            } else if ($min_sum_elements > $sum_elements) {//если мин сум больше, то обновляем массив
                $arr_min_sum = [];  // Очистка массива
                $arr_min_sum[] = [$item, $nextItem];
                $min_sum_elements = $sum_elements; // Обновление минимальной суммы
            }
        }
    }
    //echo $min_sum_elements;
    return $arr_min_sum;
}

$result = min_sum_elements($arr);
if (empty($result)) {
    echo "Исходный массив пустой, или число одно или соседний элемент не является числом";
} else if (count($result) === 1) {
    echo "В исходном массиве одна пара чисел с минимальной суммой: ";
    echo json_encode($result[0]); // вернет массив вида [1, 2]
} else {
    echo "В исходном массиве более одной пары чисел с минимальной суммой соседних элементов: ";
    echo json_encode($result);// вернет массив вида [[1, 2], [2, 1]]
}


if (isset($arr[0]) && isset($arr[1])) {// проверка на существование элементов в массиве
    $test_arr = [$arr[0], $arr[1]]; // Массив из первых двух чисел $arr
    assert(sum($result[0][0], $result[0][1]) <= sum($test_arr[0], $test_arr[1]));//функция  min_sum_elements()  правильно находит пару чисел с минимальной суммой и что эта сумма действительно является минимальной
}

assert(min_sum_elements($arr) === $result);
assert(min_sum_elements([1, 2, 3, 4]) === [[1, 2]]);//массив из двух соседних элементов, сумма которых минимальна
assert(min_sum_elements([1, 2, 1, 4]) === [[1, 2], [2, 1]]);//В исходном массиве более одной пары чисел с минимальной суммой соседних элементов
assert(min_sum_elements([1, 1, 1, 1]) === [[1, 1], [1, 1], [1, 1]]);//В исходном массиве более одной пары чисел с минимальной суммой соседних элементов
assert(empty(min_sum_elements([])));//Пустой исходный массив
assert(empty(min_sum_elements([1])));//В исходном массиве одно значение,  маловато для вычисления суммы
assert(is_array([1, 2, 3, 4]) && is_array(min_sum_elements([1, 2]))); //принимает массив и вернет массив
assert(is_array($arr) && is_array(min_sum_elements($result))); //принимает массив и вернет массив
assert(is_int(sum(1, 2))); //вернет число
assert(min_sum_elements([4, 1, "2"]) === [[4, 1]]);//массив с 4 и 1, тк это соседние числа с минимальной суммой, без перевода из строки в число
assert(empty(min_sum_elements([1, "2", "4"]))); //Пустой массив вернет, тк число одно, остальные соседние элементы без перевода из строки в число


//не получается
//assert(empty(min_sum_elements([1, "g", 4]))); //Пустой массив вернет, тк соседние элементы число и строка
//assert(empty(min_sum_elements([1, "g", "4"]))); //Пустой массив вернет, тк число одно, остальные соседние элементы без перевода из строки в число

?>
