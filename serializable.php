<?php
/**
* 
*/
class A implements Serializable
{
	private $varA;
	function __construct()
	{
		$this->varA = 'A';
	}
	function serialize()
	{
		return serialize($this->varA);
	}
	function unserialize($serialized)
	{
		$this->varA = unserialize($serialized);
	}
}
class B extends A
{
	private $varB;
	function __construct()
	{
		parent::__construct();
		$this->varB = 'B';
	}
	function serialize()
	{
		$sSerialized = parent::serialize();
		return serialize(array($this->varB, $sSerialized));
	}
	function unserialize($serialized)
	{
		$tmp = unserialize($serialized);
		$this->varB = $tmp[0];
		parent::unserialize($tmp[1]);
	}
}
$obj = new B();
$serialized = serialize($obj);
echo $serialized;
?>