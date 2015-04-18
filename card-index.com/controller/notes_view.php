<?php
class notes_view extends ACore
{
	
	public function get_content()
	{
		if ($_GET['id']) {
			$id_text = (int)$_GET['id'];
		} else {
			exit("Не правильные данные для вывода записи");
		}
		$result = $this->m->get_text_notes($id_text);
		return $result;
	}
}
?>