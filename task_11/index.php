<?php
//### Автозагрузка классов  (4 часа)
/* 11. задание 2.  Создать файл index.php и директорию src в которой размещать классы соответственно
 стандарту автозагрузки PSR-4, в каждом классе должен быть метод do. Автозагрузчик сгенерировать
при помощи composer. В файле index.php добавить use для таких классов One\Test, Two\Test, Three\Four\Test
создать экземпляры всех классов и вызвать для них метод do, чтобы не было конфликта имен использовать псевдонимы Test1, Test2, Test3 соответственно.*/


require_once __DIR__ . '/vendor/autoload.php';//подключить автозагрузчик

use One\Test as Test1;
use Three\Four\Test as Test3;
use Two\Test as Test2;

//из пространства имен One использовать класс Test под псевдонимом Test1.Аналогично Two
//из пространства имен Three,подпространства Four использовать класс Test под псевдонимом Test3

$test1 = new Test1();
$test1->do();

$test2 = new Test2();
$test2->do();

$test3 = new Test3();
$test3->do();


