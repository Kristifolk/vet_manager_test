/*
https://onlinephp.io/c/8d16b
*/



<?php
/* 15. puzzle 1. Задание 2
Создать функцию is_palindrome(string $word) которая выведет true если строка
является палиндромом(читается одинаково в зад и вперед, например: шалаш) и иначе false.
Внимание! Обязательно включите в проверки русские слова "шалаш" и "такси".
*/

//strrev Переворачивает строку задом наперёд, но не корректна с рус.яз
//mb_strlen не переворачивает слово, а получает длину строки учитывая что в кирилице один символ может занимать несколько байт
// mb_substr($word, $length, 1)  - это функция  mb_substr , которая возвращает подстроку из строки  $word.
// Она принимает три аргумента: исходную строку  $word , начальную позицию  $length  и длину подстроки
// (в данном случае 1 символ). Таким образом,  mb_substr($word, $length, 1)  извлекает один символ из
// строки  $word  на позиции  $length
function is_palindrome(string $word) {
    $word = mb_strtolower($word);//приводит к нижнему регистру
    $length = mb_strlen($word);//длина строки, шалаш = 5
    //print_r($length);
    $palindrome = "";
    while ($length > 0) {
        $length--;
        $palindrome .= mb_substr($word, $length, 1);//mb_substr — Возвращает часть строки
    }
    //print_r($palindrome);

    if ($word === $palindrome){
        return true;
    } else
        return false;
}
$test_word = "Madam";
//$test_word  = "wow";
$result = is_palindrome($test_word);
echo $result ? "true" : "false";

assert(is_palindrome("wow"));//wow является полиндромом
assert(!is_palindrome("woww"));//woww не является полиндромом
assert(is_palindrome("шалаш"));// шалаш является полиндромом
assert(is_palindrome("Шалаш"));// Шалаш является полиндромом несмотря на регистр
assert(is_palindrome("шaлaш"));// шaлaш является полиндромом несмотря на то, что буквы a англ.яз
assert(!is_palindrome("шалaш"));// шалaш не является полиндромом,тк  последяя буква a является англ.яз
assert(!is_palindrome("шалашш"));//шалашш не является полиндромом
assert(!is_palindrome("такси"));//шалашш не является полиндромом
assert(is_palindrome("топот"));// шалаш является полиндромом
assert(is_palindrome("Madam"));//  Madam является полиндромом несмотря на регистр

