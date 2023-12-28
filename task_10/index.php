<?php
//### Автозагрузка классов  (4 часа)
///* 10. задание 1. Создать файл index.php и директорию classes в которой создать файлы Test1.php и  Test2.php.
//В каждом файле разместить одноименный класс с методом do(). В файле index.php написать функцию автолоадер
//и не используя require и include создать экземпляры каждого из классов и запустить метод do()*/

spl_autoload_register(function ($className) {//ан.ф-я при обнаружении неизвестного класса Test1() будет искать файл Test1.php в папке '/classes/',если найдет-подключит
    $classFile = __DIR__ . '/classes/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

$test1 = new Test1();
$test1->do();

$test2 = new Test2();
$test2->do();