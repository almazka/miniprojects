<?php
class update_notes extends ACore_admin
	{
		protected function handler()
	{
		$handler = $this->m->update_notes();
		return $handler;
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_text = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
	$text = $this->m->get_text_notes($id_text);
	return $text;
	}
}
?>