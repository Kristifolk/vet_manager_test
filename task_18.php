/*
https://onlinephp.io/c/7ab6a
*/
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

}

function mythrow()
{
    throw new MyException("Exception mythrow");
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
        throw new \Exception("Value must be greater than or equal to 6");
    }
}

// Написать свою реализацию функции assertException, которая будет проверять что вызывается нужное исключение
//передаем имя класса исключения и функцию в качестве аргумента
function assertException(string $exceptionClass, callable $callback)
{
    try {
        $callback();// Вызов функции или метода, переданного в качестве аргумента
        echo "passed";
    } catch (\Exception $e) {
        // get_class для получения имени класса объекта. Она принимает объект в качестве аргумента и возвращает строку с именем класса этого объекта
        if (get_class($e) === $exceptionClass) {//для получения имени класса объекта исключения, которое было поймано и сравниваю с тем,которое ожидалось  в аргументах функции assertException
            echo "exception: " . $e->getMessage(), "\n";
        } else {
            throw $e;
        }
    }
}

assertException(
    \Exception::class,//имя класса исключения
    function () {//ф-я
        customthrow(2);
    }
);

assertException(
    \Exception::class,//имя класса исключения
    function () {//ф-я
        customthrow(9);
    }
);
