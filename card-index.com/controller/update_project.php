<?php
class update_project extends ACore_admin
	{
		protected function handler()
	{
		$handler = $this->m->update_project();
		return $handler;
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
	$text = $this->m->get_text_project($id);
	return $text;
	}
}
?>