<?php
class project_view extends ACore
{
	
	public function get_content()
	{
		if ($_GET['id']) {
			$id_text = (int)$_GET['id'];
		} else {
			exit("Не правильные данные для вывода записи");
		}
		$result = $this->m->get_view_project($id_text);
		return $result;
	}
}
?>