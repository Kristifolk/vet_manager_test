<?php
//8*. задание 3. Написать функцию add_item($arr, $item), которая ничего не возвращает, но
//при этом добавляет в конец массива $arr элемент $item
$arr = [1, 2, 3, 4, 5];
function add_item(&$arr, $item)
{//Символ & означает, что $arr передается по ссылке, а не по значению
    array_push($arr, $item);
}

$item = 7;
$wasCalled = false; // Флаг, который отслеживает вызов функции
$arr_copy = $arr; // Создаем копию исходного массива до вызова функции add_item() для последующей проверки
//$arr_increased_item = add_item($arr, $item);

$add_item_with_tracking = function ($item) use (&$arr, &$wasCalled) {// анонимная функция для изменения значения $wasCalled,чтобы не добавлять еще один аргумент в add_item
    add_item($arr, $item);
    $wasCalled = true;
};

$add_item_with_tracking($item);

print_r($arr);

if ($wasCalled) {
    echo "Функция add_item была вызвана. ";
} else {
    echo "Функция add_item не была вызвана. ";
}

if (in_array($item, $arr)) {
    echo "Элемент $item добавлен в массив";
}

assert(end($arr) === $item);//является последним элементом массива
assert(in_array($item, $arr));//в массиве $arr есть $item

//не пойму как напрямую в assert проверить add_item(),поэтому придуманы флаги wasCalled и add_item_with_tracking

assert($wasCalled && $arr_copy !== $arr);//функция add_item была вызвана и массивы различаются
assert($wasCalled); // Флаг, который отслеживает вызов функции add_item

?>

