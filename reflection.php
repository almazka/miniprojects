<?php
class classOne
{
	
	public function SayHelloOne()
	{
		echo "Привет от ".__CLASS__."!";
	}
}
class classTwo
{
	
	public function SayHelloTwo()
	{
		echo "Привет от ".__CLASS__."!";
	}
}
class classThree
{
	
	public function SayHelloThree()
	{
		echo "Привет от ".__CLASS__."!";
	}
}
/**
* класс, который будет все реализовать
*/
class Delegator
{
	private $list;
	function __construct()
	{
		$this->list[] = new stdClass(); // добавляем пустой класс на вяский случай, если там не оказалось
	}
	function addObject($obj)
	{
		$this->list[] = $obj;
	}
	function __call($name, $args)
	{
		foreach ($this->list as $obj) {
			$r = new ReflectionClass($obj);
		if ($r->hasMethod($name)) {
			$m = $r->getMethod($name);
			if ($m->isPublic() && !$m->isAbstract()) {
				return $m->invoke($obj, $args);
		}
		
			}
		}
	}
}
$obj = new Delegator();
$obj->addObject(new classOne());
$obj->addObject(new classThree());
$obj->SayHelloThree();
?>