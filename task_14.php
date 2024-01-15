/*
https://onlinephp.io/c/aa810
*/

<?php
/* 14. puzzle 1. Задание 1
Создать функцию even_to_zero(int $number) Которая цифры на четных ПОЗИЦИЯХ занулит.
Например, из 12345 получается число 10305. Внимание! Важна позиция цифры, а не значение.
*/
$num = 12345;
function without_remainder(int $number, int $remainder): bool
{
    return $number % $remainder === 0; //остаток от деления равен 0, значит четное
}
function even_to_zero(int $number){
    if (is_int($number)) {//надо ли проверять
        $digits = str_split($number);//Преобразуем числов строку, строку в массив
        //print_r($digits);
        for ($i = 0; $i < count($digits); $i++) {
          if (!without_remainder($i, 2)) {
              $digits[$i] = 0; //заменяю четную цифру на 0
          }
        }
        //var_dump($digits);
        $stringNumber = implode('', $digits); // массив ы строку цифр
        //var_dump ($stringNumber);
        $number = intval($stringNumber);//из строки в целое число
        return  $number;
    }
}
$result = even_to_zero($num);
echo $result;

assert(even_to_zero(12345) === 10305);//из 12345 получается число 10305
assert(even_to_zero(22222) === 20202);//из 22222 получается число 20202
assert(is_int(22222) && is_int(even_to_zero(20202))); //принимает число и вернет число
assert(is_int($num) && is_int(even_to_zero($num))); //принимает число и вернет число
assert(even_to_zero(00000) === 0);//00000 будет число 0
