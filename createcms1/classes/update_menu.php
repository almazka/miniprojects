<?php
class update_menu extends ACore_admin
	{
		protected function handler()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$text = $_POST['text'];
		if (empty($name) || empty($text)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE menu SET name='$name', text='$text' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=edit_menu");
		 	exit;
		 }
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_menu = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
		$menu = $this->get_text_menu($id_menu);
		echo "<div id='mainarea'><div id='main'>";
		if ($_SESSION["res"]) {
			echo $_SESSION["res"];
			unset($_SESSION["res"]);
		}
print <<<HEREDOC
<form action='' method='POST'>
<p>Заголовок нового пункта меню:<br />
<input type='text' name='name' style='width:420px;' value='$menu[name]'>
<input type='hidden' name='id' style='width:420px;' value='$menu[id]'>
</p>
<p>Содержимое:<br />
<textarea name='text' cols='50' rows='7'>$menu[text]</textarea>
</p>
<p><input type='submit' name='button' value='Сохранить'></p></form></div></div>
HEREDOC;
	}
	}

?>