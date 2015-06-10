<?php
class update_category extends ACore_admin
	{
		protected function handler()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		if (empty($name)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE category SET name='$name' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=edit_category");
		 	exit;
		 }
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_categ = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
		$category = $this->get_text_category($id_categ);
		echo "<div id='mainarea'><div id='main'>";
		if ($_SESSION["res"]) {
			echo $_SESSION["res"];
			unset($_SESSION["res"]);
		}
print <<<HEREDOC
<form action='' method='POST'>
<p>Заголовок нового пункта меню:<br />
<input type='text' name='name' style='width:420px;' value='$category[name]'>
<input type='hidden' name='id' style='width:420px;' value='$category[id]'>
</p>
<p><input type='submit' name='button' value='Сохранить'></p></form></div></div>
HEREDOC;
	}
	}

?>