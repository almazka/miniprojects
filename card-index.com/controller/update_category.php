<?php
class update_category extends ACore_admin
	{
		protected function handler()
	{
		$handler = $this->m->update_category();
		return $handler;
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_category = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
		$category = $this->m->get_text_category($id_category);
		return $category;
	}
}
?>