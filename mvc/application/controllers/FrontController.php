<?php
class FrontController
{
	protected $_controller, $_action, $_params, $_body;
	static $_instance;
	public static function getInstance()
	{
		if (!(self::$_instance instanceOf self))
			self::$_instance = new self();
		return self::$_instance;
	}
	private function __construct()
	{
		$request = $_SERVER['REQUEST_URI'];
		//users/get/id/1 // где user - контроллер, get - экшн, id - ключ, 1 - значение ключа
		$splits = explode('/', trim($request,'/'));
		// выбор контроллера
		$this->_controller = !empty($splits[0])?ucfirst($splits['0']).'Controller':'IndexController';
		// выбор экшена
		$this->_action = !empty($splits[1])?$splits[1].'Action':'indexAction';
		// выбор ключа
		if (!empty($splits[2])) {
			$keys = $values = array();
			for ($i=2, $cnt=count($splits); $i<$cnt; $i++) { 
				if ($i%2==0)
					$keys[] = $splits[$i];
				else
					$values[] = $splits[$i];
			}
			$this->_params = array_combine($keys, $values);
		}
	}
	public function route()
	{
		if (class_exists($this->getController())) {
			$rc = new ReflectionClass($this->getController());
			if ($rc->implementsInterface('IController')) {
				if($rc->hasMethod($this->getAction()))
				{
					$controller = $rc->newInstance();
					$method = $rc->getMethod($this->getAction());
					$method->invoke($controller);
				} else {
					throw new Exception('Wrong Action');
				}
			} else {
				throw new Exception('Wrong Interface');
			}
		} else {
			throw new Exception('Wrong Controller');
		}
	}
	function getParams()
	{
		return $this->_params;
	}
	function getController()
	{
		return $this->_controller;
	}
	function getAction()
	{
		return $this->_action;
	}
	function getBody()
	{
		return $this->_body;
	}
	function setBody($body)
	{
		return $this->_body = $body;
	}
}
?>