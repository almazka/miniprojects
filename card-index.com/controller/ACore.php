<?php
function db2array($data)
{
	$arr = array();
	while ($row = mysql_fetch_assoc($data)) {
		$arr[] = $row;
	}
	return $arr;
}
function string2array($str)
	{
		$arr = explode(",", $str);
		return $arr;
	}
function showCode($file)
	{
		if(file_exists($file)){
		$f = file_get_contents($file);
		$f = htmlspecialchars($f);
		echo "<pre>".$f."</pre>";
		} else {
		echo "Файл ".$file." не найден";
		}
	}
abstract class ACore
{
	protected $m;
	public function __construct()
	{
		$this->m = new model();
	
	}
	protected function get_header()
	{
		return TRUE;
	}
	protected function get_left_bar()
	{
		$result = $this->m->get_tags();
		return $result;
	}
	protected function get_category()
	{
		$result = $this->m->category_array();
		return $result;

	}
	protected function get_footer()
	{
		$result = $this->m->category_array();
		return $result;
	}
	public function get_body($tpl)
	{
		if ($_POST) {
			$this->handler();
		}
		$this->get_header();
		$category_top = $this->get_category();
		$left_bar = $this->get_left_bar();
		$content = $this->get_content();
		$footer = $this->get_footer();

		include "tpl/index.php";
	}
	abstract function get_content();
}
?>