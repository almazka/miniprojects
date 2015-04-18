<?php
	class edit_menu extends ACore_admin
	{
		public function get_content()
		{
		$sql = "SELECT id, name FROM menu";
		$result = mysql_query($sql) or die(mysql_error());
		$result = db2array($result);
			echo "<div id='mainarea'><div id='main'><p><a href='?option=add_menu'> >>> Добавить новый пункт меню <<<</a></p>";
			if ($_SESSION["res"]) {
			echo $_SESSION["res"];
			unset($_SESSION["res"]);
		}
			foreach ($result as $value) {
				echo "<p style='font-size: 15px;'><a href='?option=update_menu&id=".$value['id']."'>".$value['name']."</a> | <a href='?option=delete_menu&del=".$value['id']."'>Удалить пункт</a></p>";
			}
			echo "</div></div>";
		}
	}
?>