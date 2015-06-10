<?php
/*
Имеется несколько файлов разных типов, в зависимости от типа вызываются соответственные методы и делаются свои действия. В данном случае просто в зависимости от типа выводится соответствующий тип
*/

abstract class ImageType {
	protected $_type;
	function returnType()
	{
		return $this->_type;
	}
}
class GIFType extends ImageType
{
	
	function __construct($fileName)
	{
		$this->_type = 'gif';
	}
}
class JPEGType extends ImageType
{
	
	function __construct($fileName)
	{
		$this->_type = 'jpg';
	}
}
class PNGType extends ImageType
{
	
	function __construct($fileName)
	{
		$this->_type = 'png';
	}
}
class OtherType extends ImageType
{
	
	function __construct($fileName)
	{
		$this->_type = 'Неизвестный класс';
	}
}
class ImageFactory
{
	
	static function checkType($fileName)
	{
		if (strpos($fileName, '.gif'))
			return new GIFType($fileName);
		elseif (strpos($fileName, '.jpg'))
			return new JPEGType($fileName);
		elseif (strpos($fileName, '.png'))
			return new PNGType($fileName);
		else 
			return new OtherType($fileName);
	}
}
$arr = array('test.jpg','test.png','test.php','test.png','test.gif');
foreach ($arr as $value) {
	echo $value.". Тип файла - ".ImageFactory::checkType($value)->returnType()."<br>";
}
?>