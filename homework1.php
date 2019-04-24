<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson 1. Домашняя работа</title>
    <style>
        body {
            background-color: bisque;
        }
    </style>
</head>
<body>
    <h2>Домашняя работа к первому уроку</h2>
    <hr>
    <h4>1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.<br>
    2. Описать свойства класса из п.1 (состояние).<br>
    3. Описать поведение класса из п.1 (методы).<br>
    4. Придумать наследников класса из п.1. Чем они будут отличаться?</h4>
    
<?php

class mainCatalog {
    private $id; // Идентификационный номер
    private $sectionName; // Название раздела товаров
    private $categoryName; // Название категории товаров
    private $productName; // название товара
    private $productPrice; // цена товара
    public function __construct($id, $sectionName, $categoryName, $productName, $productPrice) {
        $this -> id = $id;
        $this -> sectionName = $sectionName;
        $this -> categoryName = $categoryName;
        $this -> productName = $productName;
        $this -> productPrice = $productPrice;
    }
    public function getId(){
        return $this -> id;
    }    
    public function getSectionName(){
        return $this -> sectionName;
    }    
    public function getCategoryName(){
        return $this -> categoryName;
    }
    public function getproductName(){
        return $this -> productName;
    }
    public function getproductPrice(){
        return $this -> productPrice;
    }
    protected function getInfo() {
        $info = "Идентификационный номер: " . $this -> id . "<br> Название раздела товаров: " . $this -> sectionName . "<br> Название категории товаров: " . $this -> categoryName . "<br> Название товара: " . $this -> productName . "<br> Цена: " . $this -> productPrice . " рублей"  . "<br>";
        return $info;
    }
}

class subCatalogComps extends mainCatalog {
    private $productPurpose; // предназначение товара
    public function __construct($id, $sectionName, $categoryName, $productName, $productPrice, $productPurpose) {
        parent::__construct($id, $sectionName, $categoryName, $productName, $productPrice);
        $this -> productPurpose = $productPurpose;
    }
    public function getProductPurpose(){
        return $this -> productPurpose;
    }    
    public function getInfo() {
        $info = parent::getInfo() . "Предназначение товара: " . $this -> productPurpose . "<br>";
        return $info;
    }
}

class subCatalogTVs extends mainCatalog {
    private $productDiag; // диагональ экрана
    public function __construct($id, $sectionName, $categoryName, $productName, $productPrice, $productDiag) {
        parent::__construct($id, $sectionName, $categoryName, $productName, $productPrice);
        $this -> productDiag = $productDiag;
    }
    public function getProductDiag(){
        return $this -> productDiag;
    }    
    public function getInfo() {
        $info = parent::getInfo() . "Размер диагонали: " . $this -> productDiag . " дюйма<br>";
        return $info;
    }
}

$product = new subCatalogComps(12, 'Компьютеры', 'Ноутбуки', 'HP Pavilion PZ-356', 56499, 'Для работы и офиса');
echo $product -> getInfo() . "<hr>";

$product = new subCatalogTVs(131, 'Телевизоры', 'Телевизоры Full HD', 'Телевизор LED Supra 22" STV-LC22LT0060F', 6930, 32);
echo $product -> getInfo() . "<hr>";
?>

    <h4>5. Дан код. Что он выведет на каждом шаге?</h4>
    <pre>
    class A {
      public function foo() {
        static $x = 0;
        echo ++$x;
      }
    }
    $a1 = new A();
    $a2 = new A();
    $a1->foo();
    $a2->foo();
    $a1->foo();
    $a2->foo();</pre>
    <p>Ответ: 1234.<br>
    <i>Пояснение.</i> Статические методы и свойства принадлежат классу. Хоть мы и создали два экземпляра класса, во всех случая мы обращаемся к функции одного и того же родительского класса и в каждом случае обращения инкреминтируем одну и ту же переменную $x и выводим ее на экран.</p>
    <hr>
    <h4>6. Немного изменим п.5. Объясните результаты в этом случае.</h4>
        <pre>
    class A {
      public function foo() {
        static $x = 0;
        echo ++$x;
      }
    }
    class B extends A {
    }
    $a1 = new A();
    $b1 = new B();
    $a1->foo(); 
    $b1->foo(); 
    $a1->foo(); 
    $b1->foo();</pre>
    <p>Ответ: 1122.<br>
    <i>Пояснение.</i> В этом примере мы создали дочерний класс В от родительского А. Он унаследовал от родителя функцию foo() благодаря свойству наследования в ООП, хоть мы ее в коде и не видим. Ну а дальше всё логично. Каждый экземпляр класса обращается к своему классу и инкрементирует переменные $x, принадлежашие каждая только к своему классу соответственно... </p>
    <hr>
    <h4>7. *Дан код. Что он выведет на каждом шаге? Почему?</h4>
    <pre>
    class A {
      public function foo() {
        static $x = 0;
        echo ++$x;
      }
    }
    class B extends A {
    }
    $a1 = new A;
    $b1 = new B;
    $a1->foo(); 
    $b1->foo(); 
    $a1->foo(); 
    $b1->foo();</pre>
    <p>Ответ: 1122.<br>
    <i>Пояснение.</i> В классах А и В отсутствует конструктор, в который мы передавали бы параметры при создании нового обьекта. В случае отсутствия аргументов в конструктор класса, круглые скобки после названия класса можно опустить. Поэтому результат этого примера совпадает с предыдущим.</p>
</body>
</html>