<?php

/* 13. задание 1 ## JSON(4 часа)


Есть JSON-объект следующей структуры. Нужно собственноручно не используя никаких конвертеров и никакого программирования записать этот JSON-объект в виде:

1. Ассоциативный массив PHP. К тому же напишите код для доступа к свойству id вот этой части: { "type": "comments", "id": "5" }
2. Объект созданный из [StdClass-ов PHP](https://www.php.net/manual/ru/class.stdclass.php). К тому же, напишите код для доступа к свойству id вот этой части: { "type": "comments", "id": "5" }. [Пример](https://onlinephp.io/c/366bd)
3. XML
4. YML
*/

echo "<pre>";//сохраняем исходное форматирование при выводе ниже
//читаем json
$json = file_get_contents('object.json');//принимает в качестве аргумента путь к файлу и возвращает его содержимое в виде строки
//print_r($json);
echo "<br>";
//var_dump($json);//при выводе строка
$arr = json_decode($json, true);// true перевод в ассоциативный массив
//var_dump($arr);//при выводе ассоциативный массив
//print_r($arr);

$id = ($arr["data"][0]["relationships"]["comments"]["data"][0]["id"]);
echo $id;

/*
//меняем json
foreach ($arr["data"][0]["relationships"]["comments"]["data"] as &$comment) {//по ссылке
    if ($comment["id"] == "5") {
        $comment["id"] = "555";//замена id
    }
}
print_r($arr);//обновленный массив
//запись json
$newJson = json_encode($arr);// Преобразование массива $arr в JSON-строку
file_put_contents("newobject.json", $newJson);//путь к файлу, в который нужно записать данные, и данные
*/
