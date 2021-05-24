<?php

/*http://a0528173.xsph.ru/php/classes/Person.php

"Создать 2 бабушки, 2 дедушки. Бабушки и дедушки это по линии матери будет дед и бабка и по линии отца были дед и бабка.
Задание у сына вывести на экран информацию о всей родне"

Здоровье человека не больше ста*/

class Person{// класс пишется с большой буквы
	 private $name;//свойства
	 private $lastname;
	 private $age;
	 private $hp;
	 private $mom;
	 private $dad;
	 private $grandpaD;
	 private $grandmaD;
	 private $grandpaM;
	 private $grandmaM;
	 
	 
	 function __construct($name,$lastname,$age,$mom=null,$dad=null,$grandmaD=null,$grandmaM=null,$grandpaD=null,$grandpaM=null){//метод
		$this->name=$name;//текущий объект 
		$this->hp=100;
		$this->lastname=$lastname;
		$this->age=$age;
		$this->mom=$mom;
		$this->dad=$dad;
		$this->grandpaD=$grandpaD;
		$this->grandmaD=$grandmaD;
		$this->grandpaM=$grandpaM;
		$this->grandmaM=$grandmaM;
		
	 }
	 function sayHi($name){
		 return "Hello $name, I am ".$this->name;
	 }
	 
	 function setHp($hp){//устанавливаем хп сэттер
		 if($this->hp+$hp>=100) $this->hp=100;
		 else $this->hp=$this->hp+$hp;
	 }
	 function getHp(){//геттер 
		 return $this->hp;
	 }
	 function getName(){
		 return $this->name;
	 }
	 function getMom(){
		 return $this->mom;
	 }
	 function getDad(){
		 return $this->dad;
	 }
	 function getLastname(){
		 return $this->lastname;
	 }
	 function getAge(){
		 return $this->age;
	 }
	 function getGrandmaM(){
	 	 return $this->grandmaM;
	 }
	 function getGrandmaD(){
	 	 return $this->grandmaD;
	 }
	 function getGrandpaM(){
	 	 return $this->grandpaM;
	 }
	 function getGrandpaD(){
	 	 return $this->grandpaD;
	 }
	 function getInfo(){
		 return
		 "<body style='background:green'><hr><h1 style='color:red'>MY GYNECOLOGICAL TREE:</h1>".
		 "<hr><h2 style='color:yellow'>My Name is: ".$this->getName()." ".$this->getLastname()."."." I'm ".$this->getAge()." years old.".
		 "<br>My Parents is: ".$this->getDad()->getName()." ".$this->getDad()->getLastname()."  &  ".$this->getMom()->getName()." ".$this->getMom()->getLastname().".".
		 "<br>My Grandmothers is: ".$this->getGrandmaM()->getName()." ".$this->getGrandmaM()->getLastName()."  &  ".$this->getGrandmaD()->getName()." ".$this->getGrandmaD()->getLastname().".".
		 "<br>My Grandfathers is: ".$this->getGrandpaM()->getName()." ".$this->getGrandpaM()->getLastName()."  &  ".$this->getGrandpaD()->getName()." ".$this->getGrandpaD()->getLastname().".</h2></body><hr>";
	 }
}

$alex=new Person("Alex","Smit",33,$angelina,$jack);//dad
$ira=new Person("Ira","Smit",25,$ibumba,$igor);//mom

$angelina=new Person("Angelina","Smit",80);//grandmaD
$jack=new Person("Jack","Smit",88);//grandpaD

$ibumba=new Person("Ibumba","MaMaTuMba",77);//grandmaM
$igor=new Person("Igor","MaMaTuMba",59);//grandpaM

$john=new Person("John","Smit",11,$ira,$alex,$angelina,$ibumba,$jack,$igor);//I 

echo $john->getInfo();

//echo $john->getMom()->getName()."<hr>";
//echo $john->getMom()->getDad()->getName()."<hr>";

//$medKit=55;
//$alex->setHp(-30);//упал
//echo $alex->getHp()."<br>";
//$alex->setHp($medKit);//нашел аптеку
//echo $alex->getHp();


//$alex->name="Alex";
//$alex->age=22;
//echo $alex->sayHi($igor->name)."<hr>";
//echo $alex->name."<br>";
//echo $igor->name;
//echo $alex->age;
?>