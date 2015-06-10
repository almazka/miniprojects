<?php
/**
* если надо что-то добавить, не обязательно наследовать по сто раз, тут по цепочке основные свойства берутся и в самом декоратионе добавляется что-то новое
*/
abstract class ACourse extends
{
	abstract function action();
}
class Course extends ACourse
{
	function action(){};
	
}
abstract class ACourseDecorator extends ACourse
{
	private $_course;
	function __construct(ACourse $course)
	{
		$this->_course = $course;
	}
	function action(){
		$this->_course->action();
	}
}
class CourseDecorator extends ACourseDecorator
{
	
	function action()
	{
		// что-то добавили
		parent::action();
		// что-то после
	}
}
$c = new CourseDecorator(new Course);
$c->action();

?>