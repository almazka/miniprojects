<?php
class view extends ACore
{
	
	public function get_content()
	{
		if ($_GET['id']) {
			$id_text = (int)$_GET['id'];
		} else {
			exit("Не правильные данные для вывода статьи");
		}
		$result = $this->m->get_view_content($id_text);
		return $result;
	}
}
?>