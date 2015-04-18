<?php
class category extends ACore
{
	
	public function get_content()
	{
		if (!$_GET['id']) {
			echo "Не правильные данные для вывода меню";
		} else {
			$id = (int)$_GET['id'];
		if (!$id) {
			echo "Не правильные данные для вывода меню";
		} else {
			$row = $this->m->get_category_content($id);
			return $row;
		}
		}
	}
}
?>