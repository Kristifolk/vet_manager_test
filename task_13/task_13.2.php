<?php
/* 13. задание 2 ## JSON(4 часа)

Есть JSON-объект следующей структуры. Нужно собственноручно не используя никаких конвертеров и никакого программирования записать этот JSON-объект в виде:

1. Ассоциативный массив PHP. К тому же напишите код для доступа к свойству id вот этой части: { "type": "comments", "id": "5" }
2. Объект созданный из [StdClass-ов PHP](https://www.php.net/manual/ru/class.stdclass.php). К тому же, напишите код для доступа к свойству id вот этой части: { "type": "comments", "id": "5" }. [Пример](https://onlinephp.io/c/366bd)
3. XML
4. YML

пример для задания 2
<?php
$innerNode = new stdClass();
$innerNode->link = "http://hh.ff.ff";
$innerNode->description = "My link";

$outerNode = new stdClass();
$outerNode->innerNode = $innerNode;

var_dump($outerNode);
# Как достучаться до линка
var_dump($outerNode->innerNode->link);

*/

echo "<pre>";
//читаем json
$json = file_get_contents('object.json');//принимает в качестве аргумента путь к файлу и возвращает его содержимое в виде строки
//print_r($json);
echo "<br>";
//var_dump($json);//при выводе строка
$objectAStdClass = json_decode($json, false);// false перевод в объект типа stdClass
//var_dump($arr);//при выводе объект типа stdClass
//print_r($objectAStdClass);

var_dump($objectAStdClass->data[0]->relationships->comments->data[0]->id);//доступа к свойству id

