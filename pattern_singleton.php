<?php
/* Есть файл ини, в котором запись, мы туда можем записать новую запись и вывести оттуда какую-нить запись, только экземпляр класса одлжн быть один */
class Config
{
	const INI_NAME = 'config.ini';
	static private $_instance = null;
	private $_setting;
	private $_updated = false;
	private function __construct()
	{
		if (file_exists(self::INI_NAME)) {
			$this->_setting = parse_ini_file(self::INI_NAME);
		}
	}
	private function __clone(){}
	static function GetInstance()
	{
		if (self::$_instance == null) {
			self::$_instance = new Config();
		}
		return self::$_instance;
	}
	function __destruct()
	{
		if (!$this->_updated)
			return;
			$f = fopen(__DIR__.'/'.self::INI_NAME, 'w');
			if (!$f) return;
			foreach ($this->_setting as $k=>$v) {
				fputs($f, "$k=$v\n");
			}
			fclose($f);
	}
	public function get($name)
	{
		if (isset($this->_setting[$name]))
			return $this->_setting[$name];
		else
			return null;
	}
	public function set($name, $value)
	{
		if (!isset($this->_setting[$name]) or $this->_setting[$name] != $value) {
			$this->_setting[$name] = $value;
			$this->_updated = true;
		}
	}
}
$conf = Config::GetInstance();
echo $conf->get('name');
$conf->set('age',25);
?>