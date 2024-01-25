<?php

require_once __DIR__ . '/vendor/autoload.php';

use MyLib\ExchangedAmount;


$amount = new ExchangedAmount("USD", "UAH", 100);
// Вернет на текущую дату. На 25.01.2024 вернет 3745.44
var_dump($amount->toDecimal());