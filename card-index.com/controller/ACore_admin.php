<?php
function db2array($data)
{
	$arr = array();
	while ($row = mysql_fetch_assoc($data)) {
		$arr[] = $row;
	}
	return $arr;
}
function reArrayFiles($file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
abstract class ACore_admin
{
	protected $m;
	public function __construct()
	{
		if (!$_SESSION['user']) {
			header("Location:?option=login");
		}
	$this->m = new model();
	}
	protected function get_header()
	{
		return TRUE;
	}
	protected function get_left_bar()
	{
		return TRUE;
	}
	protected function get_footer()
	{
		return TRUE;
	}
	public function get_body($tpl)
	{
		if ($_POST || $_GET['del']) {
			$this->handler();
		}
		$this->get_header();
		$content = $this->get_content();
		$footer = $this->get_footer();
		$categ = $this->m->get_categories();
		
		

		include "tpl/index_admin.php";
	}
	abstract function get_content();
}
?>