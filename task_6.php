<?php
//### Рекурсия, Замыкание, работа с ссылками, функции высшего порядка  (4 часа)
//6*. задание 1. Написать рекурсивную функцию sumn рассчета суммы 1 + 2 + 3 + ... + n.
//assert(sumn(2) == 3);
//assert(sumn(3) == 6);
// Напишите еще несколько проверок
function sumn(int $number): int
{

    if ($number === 0) {
        return 0;
    } else if ($number === 1) {
        return 1;
    } else {
        return $number + sumn($number - 1);
    }
}

$a = 3;

if (!is_int($a)) {
    echo "Функция sumn() работает только с числами, введите число";
} else if ($a < 0) {
    echo "Функция sumn() работает с положительными числами";
    exit;//Без него Fatal
} else {
    $result = sumn($a);
    echo "Итого: $result";
}


assert(sumn(2) == 3);
assert(sumn(3) == 6);
assert(sumn(1) == 1);
assert(sumn(5) == 15);
assert(sumn(0) == 0);


assert(is_int($a)); //принимает число
assert(is_int(sumn(2))); //вернет число
assert(is_int(sumn($a))); //вернет число


//не разобралась
//assert
//$a = "2";
//$a = "f";
//$a = -1;

