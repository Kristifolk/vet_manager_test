<?php
// ### Исключения  (6 часов)
/* 18.
1 Создать класс исключения MyException и отдельную функцию mythrow которая бросает исключение класса MyException.
2 Написать код, который перехватывает все исключения брошенные функцией mythrow и выводит при спойманном исключении текст 'exception', иначе выводит 'passed'
3 Написать функцию customthrow(int $i) которая бросает исключение \Exception если $i меньше 6. Написать свою реализацию функции  assertException(стандартными средствами языка php),
которая будет проверять что вызывается нужное исключение. Вызов функции может выглядеть так:
assertException(
    \Exception::class,
    function() {
        customthrow(2);
    }
);
*/

class MyException extends Exception
{
    function mythrow()
    {
        throw new MyException("Exception mythrow");
    }
}

try {
    mythrow();
    echo "passed";
} catch (MyException $e) {
    echo "exception: " . $e->getMessage(), "\n";
}

function customthrow(int $i)
{
    if ($i < 6) {
        throw new Exception("Exception customthrow");
    }
}

// Написать свою реализацию функции  assertException(стандартными средствами языка php), которая будет проверять что вызывается нужное исключение
function assertException()
{
}

assertException(
    \Exception::class,
    function () {
        customthrow(2);
    }
);
