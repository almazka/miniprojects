<?php
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
		$text = $this->m->get_text_article($id_text);
		

		include "tpl/index_admin.php";
	}
	abstract function get_content();
}
?>