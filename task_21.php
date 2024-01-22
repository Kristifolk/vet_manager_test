<?php
// ### Трейты, генераторы, магические методы  (6 часов)
/* 21. Задание 2
Почините тест написал код вместо троеточия, не используйте __construct()
    class A {
        private string $a = "gg";
        ...
    }
    assert(
        "GG" == (new A)->a
    )
*/

class A
{
    private string $a = "gg";

    public function __get($name)
    {
        if ($name === 'a') {
            return strtoupper($this->a);//регистр
        }
    }

    public function __toString()
    {
        return $a;
    }
}

echo (new A)->a;

assert("GG" == (new A)->a);