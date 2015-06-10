<?php
class category extends ACore
{
	public function get_content()
	{
		if (!$_GET['id']) {
			echo "Не правильные данные для вывода статьи";
		} else {
			$id_cat = (int)$_GET['id'];
		if (!$id_cat) {
			echo "Не правильные данные для вывода статьи";
		} else {
		$result = $this->m->get_category_content($id_cat);
			return $result;
		}
	}
	}
}
?>