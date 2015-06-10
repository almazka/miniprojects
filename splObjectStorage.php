<?php
class Course
{
	private $_name;
	function __construct($n)
	{
		$this->_name = $n;
	}
	function __toString()
	{
		return $this->_name;
	}
}
$courses = new SplObjectStorage();
$php = new Course('php');
$xml = new Course('xml');
$java = new Course('java');

$courses->attach($php);
var_dump($courses->contains($php)); // true
var_dump($courses->contains($java)); // false
$courses->attach($xml); // добавить в т.н. хранилище
var_dump($courses->contains($php)); // false
var_dump($courses->contains($xml)); // true
$courses->detach($xml); // выкинуть из т.н. хранилища

$titles = [];
foreach ($courses as $cours) {
	$titles[] = (string)$course;
	print join(', ', $titles);
}

?>