<?php
/**
* Фишка в том, чтобы залезть в форич, тут производится действие - возвести в квадрат числа от 2 до 5 и последовательно их вывести
*/
class NumberSquared implements Iterator
{
	private $_start, $_end, $_cur;
	public function __construct($s, $e)
	{
		$this->_start = $s;
		$this->_end = $e;
	}
	public function rewind()
	{
		$this->_cur = $this->_start;
	}
	public function key()
	{
		return $this->_cur;
	}
	public function current()
	{
		return pow($this->_cur, 2);
	}
	public function next()
	{
		return $this->_cur++;
	}
	public function valid()
	{
		return $this->_cur <= $this->_end;
	}
}
$nums = new NumberSquared(3,7);
foreach ($nums as $a => $v) {
	echo "Квадрат числа ".$a."= ".$v."<br>";
}
?>