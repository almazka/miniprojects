<?php
class menu extends ACore
{
	
	public function get_content()
	{
		if (!$_GET['id']) {
			echo "Не правильные данные для вывода меню";
		} else {
			$id_menu = (int)$_GET['id'];
		if (!$id_menu) {
			echo "Не правильные данные для вывода меню";
		} else {
			$row = $this->m->get_menu_content($id_menu);
			return $row;
		}
		}
	}
}
?>