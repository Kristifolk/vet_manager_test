<?php
// ### Трейты, генераторы, магические методы  (6 часов)
/* 22. Задание 3
При помощи trait добавьте классам новый метод, почините тесты заменив троеточие на код
trait UpperNameTrait {
...
}

class User {
...
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}

class Customer {
...
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}

assert(
    (new User('vova'))->upperName() == 'VOVA'
);

assert(
    (new Customer('vova'))->upperName() == 'VOVA'
);

*/

trait UpperNameTrait {
    public function upperName()
    {
        return strtoupper($this->name);
    }
}

class User {
    use UpperNameTrait;
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}

class Customer {
    use UpperNameTrait;
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}

assert(
    (new User('vova'))->upperName() == 'VOVA'
);

assert(
    (new Customer('vova'))->upperName() == 'VOVA'
);
