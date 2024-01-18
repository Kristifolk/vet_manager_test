<?php
// ### Трейты, генераторы, магические методы  (6 часов)
/* 23. Задание 4
Какая разница между двумя версиями функции getLines, какие преимущества и какие ограничения привносит использование генераторов?
// Версия 1
function getLines($file) {
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {
            yield $line;
        }
    } finally {
        fclose($f);
    }
}
// Версия 2
function getLines($file) {
    $f = fopen($file, 'r');
    try {
        $result = []
        while ($line = fgets($f)) {
            $result[] = $line;
        }
    } finally {
        fclose($f);
    }
    return $result;
}

foreach (getLines("file.txt") as $n => $line) {
    ...
}

*/
/*
// Версия 1
function getLines($file) {
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {// fgets Читает строку из файла
            yield $line;
        }
    } finally {
        fclose($f);
    }
}
*/

// Версия 2
function getLines($file) {
    $f = fopen($file, 'r');
    try {
        $result = [];
        while ($line = fgets($f)) {
            $result[] = $line;
        }
    } finally {
        fclose($f);
    }
    return $result;
}

foreach (getLines("file.txt") as $n => $line) {
    echo "$line\n";
    //echo ( "Строка $n: $line\n");
}

