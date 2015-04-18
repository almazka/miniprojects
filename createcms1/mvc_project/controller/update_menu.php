<?php
class update_menu extends ACore_admin
	{
		protected function handler()
	{
		$handler = $this->m->update_menu();
		return $handler;
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_menu = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
		$menu = $this->m->get_text_menu($id_menu);
		return $menu;
	}
}
?>