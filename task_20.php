<?php
// ### Трейты, генераторы, магические методы  (6 часов)
/* 20. Задание 1
Почините тест написав код вместо троеточия
 class A {
        ...
    }

    assert(
        "GGGG" ==
        (new A) . (new A)
    );

*/

class A
{
    public $foo;

    public function __construct()
    {
        $this->foo = "GG";
    }

    public function __toString()
    {
        return $this->foo;
    }
}

echo (new A) . (new A);
assert("GGGG" == (new A) . (new A));