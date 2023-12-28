<?php
/* 12. задание 1 ### Composer и работа с библиотеками

1. Установить композер на свой компьютер
2. Создать новую директорию в ней index.php и директорию src, в которой создать класс Test с методом doSomething
.
src
.
Test.php
index.php
3. Инициализировать проект composer, сгенерировать автолоадер который через require подключить в файле index.php и создать объект класса Test
4. Подключить библиотеку monolog/monolog и при помощи неё логировать каждый вызов метода в файл /tmp/mylog.log*/

require_once __DIR__ . '/vendor/autoload.php';//подключить автозагрузчик

use monolog/monolog;



$test = new Test();
$test->doSomething();