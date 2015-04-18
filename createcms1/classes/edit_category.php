<?php
	class edit_category extends ACore_admin
	{
		public function get_content()
		{
		$sql = "SELECT id, name FROM category";
		$result = mysql_query($sql) or die(mysql_error());
		$result = db2array($result);
			echo "<div id='mainarea'><div id='main'><p><a href='?option=add_category'> >>> Добавить новый пункт категории <<<</a></p>";
			if ($_SESSION["res"]) {
			echo $_SESSION["res"];
			unset($_SESSION["res"]);
		}
			foreach ($result as $value) {
				echo "<p style='font-size: 15px;'><a href='?option=update_category&id=".$value['id']."'>".$value['name']."</a> | <a href='?option=delete_category&del=".$value['id']."'>Удалить пункт</a></p>";
			}
			echo "</div></div>";
		}
	}
?>