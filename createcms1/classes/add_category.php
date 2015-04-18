<?php
class add_category extends ACore_admin
{
	protected function handler()
	{
		$name = $_POST['name'];
		
		if (empty($name)) {
			exit("Введите имя новой категории");
		}
		$sql = "INSERT INTO category (name) VALUES('$name')";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=add_category");
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
<p>Заголовок нового пункта категории:<br />
<input type='text' name='name' style='width:420px;'>
</p>
<p><input type='submit' name='button' value='Сохранить'></p></form></div></div>
HEREDOC;
	}
}

?>