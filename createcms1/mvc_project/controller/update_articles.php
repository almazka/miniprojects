<?php
class update_articles extends ACore_admin
	{
		protected function handler()
	{
		$handler = $this->m->update_article();
		return $handler;
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_text = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
	$text = $this->m->get_text_article($id_text);
	return $text;
	}
}
?>