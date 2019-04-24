<?
// Задание 1. Создать структуру классов ведения товарной номенклатуры.

abstract class Product {
    private $name; //название товара
    private $price; // цена условной единицы товара
    private $number; // количество условных единиц товара
    
    public function setName($name) {
        $this -> name = $name;
    }
    public function getName() {
        return $this -> name;
    }
    
    public function setPrice($price) {
        $this -> price = $price;
    }
    public function getPrice() {
        return $this -> price;
    }
    
    public function setNumber($number) {
        $this -> number = $number;
    }
    public function getNumber() {
        return $this -> number;
    }
    abstract function calc(); // абстрактный метод подсчета стоимости товара
    abstract function show(); // абстрактный метод вывода корзины товара
}

class DigitalProduct extends Product {
    function calc() {
        $sum = $this -> getPrice() / 2 *  $this -> getNumber();
        return $sum;
    }
    function show(){
        echo "Товар: " . $this -> getName() . ". Цена, руб.: " . $this -> getPrice() / 2 . ". Количество единиц: " . $this -> getNumber() . ". Сумма, руб.: " . $this -> calc() . "<br>";
    }
}

class PieceProduct extends Product {
    function calc() {
        $sum = $this -> getPrice() *  $this -> getNumber();
        return $sum;
    }
    function show(){
        echo "Товар: " . $this -> getName() . ". Цена, руб.: " . $this -> getPrice() . ". Количество штук: " . $this -> getNumber() . ". Сумма, руб.: " . $this -> calc() . "<br>";
    }
}

class WeightProduct extends Product {
    function calc() {
        $sum = $this -> getPrice() *  $this -> getNumber();
        return $sum;
    }
    function show(){
        echo "Товар: " . $this -> getName() . ". Цена, руб.: " . $this -> getPrice() . ". Количество килограмм: " . $this -> getNumber() . ". Сумма, руб.: " . $this -> calc() . "<br>";
    }
}

$digiObj = new DigitalProduct;
$digiObj -> setName("Цифровая книга");
$digiObj -> setPrice(400);
$digiObj -> setNumber(1);
$digiObj -> show();

$pieceObj = new PieceProduct;
$pieceObj -> setName("Кола");
$pieceObj -> setPrice(50);
$pieceObj -> setNumber(3);
$pieceObj -> show();

$weightObj = new WeightProduct;
$weightObj -> setName("Апельсины");
$weightObj -> setPrice(60);
$weightObj -> setNumber(2.5);
$weightObj -> show();

Echo "<hr>" . "Итого к оплате: " . ($digiObj -> calc() + $pieceObj -> calc() + $weightObj -> calc()) . " рублей"; 

// Задание 2. *Реализовать паттерн Singleton при помощи traits.

trait dbOperations {
        function delete($sql){
        ...
    }
	    function insert($sql){
        ...
    }
}

class DB {
    private static $connect;
    private static $db;
    private function __construct(){
        DB::$connect = mysqli_connest(...);
    }
    public static function getObject(){
        if(DB::$db == null){
            DB::db = new DB;
        }
        return DB::$db;
    }
    use dbOperations;
}

class Test {
    function test() {
        $obj = DB::getObject();
        $obj -> delete(...);
    }
}
