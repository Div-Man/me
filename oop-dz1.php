<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(-1);

class Car{
	public $rusTrue = 'Выпущена в России';
	public $rusFalse = 'Выпущена за границей';
	
	public function __construct($marka, $model, $year){
		$this->marka = $marka;
		$this->model = $model;
		$this->year = $year;
	}
	public function isOld(){
		if($this->year < 2005){
			return 'Вашу машину ' . $this->marka. ' ' . $this->model.', пора отправить на реставрацию. ';
		}
		else{
			return 'Ваша машина ' . $this->marka. ' ' . $this->model.', как новая. ';
		}
	}
	public function isRus(){
		switch(mb_strtolower($this->marka)){
			case 'vaz':
			case 'lada':
			case 'uaz':
			case 'gazel':
			case 'volga':
			case 'kamaz':
			case 'zil':
				return $this->rusTrue;
			default:
				return $this->rusFalse;
		}
	}
}

$vaz = new Car('VAZ', '21074', 2004);
$bmw = new Car('BMW', '5', 2010);

echo $vaz->isOld();
echo $vaz->isRus();
echo '<br>';
echo $bmw->isOld();
echo $bmw->isRus();

echo '<br>';
echo '-----------------------------------------------------<br>';
/////////////////////////////////////////////////


class Televizor{
	public $ask = 'Какой телевизор вы хотите?';
	private $color = 'black';
	
	public function __construct($model){
		$this->model = $model;
	}
	public function publicColor($value){
		if(empty($value)){
			return $this->color = $this->color;
		}
		return $this->color = $value;
	}
	public function wontTv($val){
		return 'Я хочу телевизор ' . $this->model . ', '. $this->publicColor($val) . ' цвета';
	}
}

$lg = new Televizor('Lg');
echo $lg->ask;
echo '<br>';
echo $lg->wontTv('');

echo '<br>';
echo '<br>';

$samsung = new Televizor('Samsung');
echo $samsung->ask;
echo '<br>';
echo $samsung->wontTv('blue');

echo '<br>';
echo '-----------------------------------------------------<br>';
/////////////////////////////////////////////////

class BallPen{
	private $maxPen = 10;
	
	public function __construct($count){
		$this->count = $count;
	} 
	public function PutPen(){
		if($this->count < $this->maxPen){
			return 'Осталось ' . ($this->maxPen - $this->count) . ' мест(а) для ручек';
		}
		elseif($this->count === $this->maxPen){
			return 'В пенале больше места нет';
		}
		else{
			return 'Столько ручек в пенал не влезит';
		}
	}
}

$pen1 = new BallPen(8);
$pen2 = new BallPen(10);
$pen3 = new BallPen(13);

echo $pen1->PutPen() . '<br>';
echo $pen2->PutPen() . '<br>';
echo $pen3->PutPen() . '<br>';

echo '<br>';
echo '-----------------------------------------------------<br>';
/////////////////////////////////////////////////

class Duck{
	public $description = 'В каждом ящике по 5 уток';
	public static $action = 'Привезли 1 ящик стало ';
	
	public static $contDuck = 0;
	public static function duckIncrease($val){
		return self::$action . ' ' .self::$contDuck=self::$contDuck+$val . ' уток';
	}
}
$duck1 = new Duck(); 
$duck2 = new Duck(); 
$duck3 = new Duck(); 

echo $duck1->description . '<br>';

echo $duck1::duckIncrease(5) . '<br>';
echo $duck2::duckIncrease(5) . '<br>';
echo $duck3::duckIncrease(5) . '<br>';

echo '<br>';
echo '-----------------------------------------------------<br>';
/////////////////////////////////////////////////

class Product{
	public function __construct($product, $color){
		$this->product = $product;
		$this->color = $color;
	}
	public function importBread(){
		if($this->color == 'белый'){
			return $this->answerWhite();
		}
		
		elseif($this->color == 'чёрный'){
			return $this->answerBlack();
		}
	}
	public function answerWhite(){
		return 'Привезли белый ' . $this->product;
	}
	
	public function answerBlack(){
		return 'Привезли чёрный ' . $this->product;
	}
}

$bread = new Product('хлеб', 'чёрный');
$bread2 = new Product('хлеб', 'белый');

echo $bread->importBread();
echo '<br>';
echo $bread2->importBread();
