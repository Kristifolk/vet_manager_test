--из директории склонированного репозитоия mysql-with-questions 

SHOW DATABASES; -- показываем все базы данных
USE intern; -- выбираем базу MySQL, в ней решаем задачи

-- 1) Выведите список всех таблиц в базе данных
SHOW TABLES FROM intern;

-- 2) Выберите все счета за последние 2 месяца
SELECT * FROM invoice WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH);
--ответ Empty
--SELECT * FROM invoice WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 3 YEAR);
--ответ выводит
--DATE_SUB для вычитания определенного интервала времени из указанной даты или времени

-- 3) Выведите даты счетов в формате "June 15 2017"
SELECT DATE_FORMAT(created_at, '%M %e %Y') AS formatted_date
FROM invoice;
--DATE_FORMAT(date, '%M %e %Y')  используется для форматирования значения даты в указанный формат
--AS formatted_date  используется для задания псевдонима для отформатированной даты. Это позволяет нам обращаться к отформатированной дате по новому имени столбца в результирующем наборе данных

-- 4) Выведите клиентов и их питомцев через запятую. Например: Shevchenko | Tayson, Rex, Baron
SELECT client.last_name, GROUP_CONCAT(pet.alias SEPARATOR ', ') AS pets
FROM client
JOIN pet ON client.id = pet.client_id
GROUP BY client.last_name;
--GROUP_CONCAT(expression [ORDER BY clause] [SEPARATOR separator]) для объединения значений строк в группе в одну строку с разделителем
--Join - операции горизонтального соединения данных
--JOIN – левая_таблица JOIN правая_таблица ON условия_соединения

-- 5) Выведите список ФИО всех клиентов. Например: Solyanka E.S.
SELECT CONCAT(last_name, ' ', LEFT(first_name, 1), '.', LEFT(middle_name, 1), '.') AS full_name
FROM client;
--CONCAT(string1, string2, ...) для объединения двух или более строк в одну строку. string1, string2, ...  - это строки или столбцы, которые нужно объединить. Они могут быть либо явными строковыми значениями, либо столбцами таблицы, содержащими строковые значения
--LEFT(string, length) для извлечения указанного количества символов из начала строки

-- 6) Посчитайте сумму всех счетов по клиентам. Вывод 2 колонки: FIO, Summ.
SELECT CONCAT(client.last_name, ' ', LEFT(client.first_name, 1), '.', LEFT(client.middle_name, 1), '.') AS FIO, SUM(invoice.amount) AS Summ
FROM client
JOIN invoice ON client.id = invoice.client_id
GROUP BY FIO;

--Вариант 1--
-- 7) Сделать дамп базы через CLI
--зайти в контейнер 'intern-mysql' из него в командную строку
docker exec -it intern-mysql /bin/bash
--Сделать дамп БД 'intern' в файл '222.sql'
mysqldump -uroot -p123456 intern > 222.sql
--Дамп '222.sql' сохраняется в контейнере, а не на компе. Надо вытащить из контейнера файлы и сохранить на комп
 docker cp intern-mysql:/ /home/kristin/work/docker/vet_manager_test/task_26/mysql-with-questions/dump

-- 8) Удалить базу и импортировать из дампа через CLI
--Удалить БД 'intern'
mysql -u root -p123456 -e "drop database intern;"
--создать БД 'intern' 
mysql -u root -p123456 -e "create database intern;"
--Импортирование БД 'intern' из дампа '222.sql'
mysql -uroot -p123456 intern < 222.sql

--Вариант 2 (после указания порта 33061)--
-- 7) Сделать дамп базы через CLI
-- 8) Удалить базу и импортировать из дампа через CLI
--заходим в mysql  
--mysql -h 172.17.0.1 -P 33061 --protocol=tcp -u root -p
mysql -hlocalhost -P33061 --protocol=tcp -uroot -p123456 
--дамп с терминала: вызывать из директории куда будет скачиваться дамп БД
 mysqldump -hlocalhost -P33061 --protocol=tcp -uroot -p123456 intern > new.sql
--импорт БД из дампа: 
mysql -hlocalhost -P33061 --protocol=tcp -uroot -p123456 intern < new.sql










