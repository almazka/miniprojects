<?php
class add_menu extends ACore_admin
{
	protected function handler()
	{
		$name = $_POST['name'];
		$text = $_POST['text'];
		
		if (empty($name) || empty($text)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "INSERT INTO menu (name,`text`) VALUES('$name','$text')";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=add_menu");
		 	exit;
		 }
	}
	public function get_content()
	{
		echo "<div id='mainarea'><div id='main'>";
		if ($_SESSION["res"]) {
			echo $_SESSION["res"];
			unset($_SESSION["res"]);
		}
print <<<HEREDOC
<form action='' method='POST'>
<p>Заголовок нового пункта меню:<br />
<input type='text' name='name' style='width:420px;'>
</p>
<p>Содержимое:<br />
<textarea name='text' cols='50' rows='7'></textarea>
</p>
<p><input type='submit' name='button' value='Сохранить'></p></form></div></div>
HEREDOC;
	}
}

?>