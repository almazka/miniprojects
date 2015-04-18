<?php
class tags extends ACore
{
	public function get_content()
	{
		if (!$_GET['id']) {
			echo "Не правильные данные для вывода содержимого";
		} else {
			$id = (int)$_GET['id'];
		if (!$id) {
			echo "Не правильные данные для вывода содержимого";
		} else {
		

		$result = $this->m->get_tags_content($id);
			return $result;
		}
	}
	}
}
?>