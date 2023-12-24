<?php
//7*. задание 2. Написать функцию create_min_max_validator(int $min, int $max) которая возвращает функцию принимающую один аргумент, функция проверяет входит ли аргумент в диапазон от $min до $max включительно.
//$validator = create_min_max_validator(2, 5);
//assert($validator(3));
//assert(!$validator(6));
function create_min_max_validator(int $min, int $max)
{
    if (is_int($min) && is_int($max)) {//условие не работает строка "2" проходит валидацию
        return function ($value) use ($min, $max) {//вернуть анонимную функцию (замыкание)
            if ($value >= $min && $value <= $max) {//условия проверки аргумента анонимной функции
                if (is_int($value)) {
                    return $value;
                }
            }
        };
    }
}

$min = 2;// диапазон от
$max = 5;// до
$value = 3; // Число, которое хочу проверить

$validator = create_min_max_validator($min, $max);//create_min_max_validator возвращает анонимную функцию function ($value)


if ($validator($value)) {
    echo "Успешная валидация числа $value";
} else {
    echo "$value не прошло валидацию";
}


//var_dump($validator);
assert($validator(3));// проверка, что 3 проходит валидацию
assert($validator(2));// проверка, что 2 проходит валидацию
assert(!$validator(6));//проверка,что валидатор отклонит значение вне диапазона 2-5
assert(!$validator(-3));//проверка,что валидатор отклонит значение вне диапазона 2-5
assert(!$validator("2"));//проверка,что валидатор отклонит строковое значение
assert(!$validator("f"));//проверка,что валидатор отклонит строковое значение

assert(is_int($min)); //принимает число
assert(is_int($max)); //принимает число
assert(is_int($value)); //принимает число

assert(is_callable($validator)); // Проверка, что $validator является вызываемым объектом (функцией)


//не разобрала
// assert
//$min = "1";// диапазон от  строка Не должно проходить валидацию
//$max = 5;
//$value = 2;

?>

