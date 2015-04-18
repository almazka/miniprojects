<?php
class Animal
{
	public $name;
	public $age = 0;
	function __construct(argument)
	{
		# code...
	}
}
$cat = new Animal;
$dog = new Animal;
$cat->name = "Murzik";
$dog->name = "Tuzik";
class User
{
	public $name;
	public $login;
	public $pass;
	
	function __construct($n, $l, $p)
	{
		$this->name = $n;
		$this->login = $l;
		$this->pass = $p;
	}
	public function ehoUser()
	{
		echo "<p>Name: ".$this->name;
		echo "<br>Login: ".$this->login;
		echo "<br>Password: ".$this->pass;
	}
	function __destruct()
	{
		echo "<br>Пользователь ".$this->name." удален.";
	}
	function __clone()
		{
			echo "<hr>Пользователь ".$this->name." скопирован";
			$this->name = "Lol";
			$this->login = "Kit";
			$this->pass = "000";
		}
}
class SuperUser extends User
{
	public $role;
	function __construct($n, $l, $p, $r)
	{
		parent::__construct($n, $l, $p);
		$this->role = $r;
	}
	public function ehoUser()
	{
		parent::ehoUser();
		echo "<br>Role: ".$this->role;
	}
}
$user1 = new User('John Smith', 'John', 'passJohn');
$user1->ehoUser();
$user2 = new User('Alla Serrsa', 'Alla', 'passAlla');
$user2->ehoUser();
$user3 = new User('Nic Sun', 'Nik', 'passlol');
$user3->ehoUser();
$user4 = clone $user2;
$user4->ehoUser();
$user = new SuperUser('Aliona',"Akilan","passss", 'admin');
$user->ehoUser();
?>