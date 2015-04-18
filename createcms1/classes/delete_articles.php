<?php
class delete_articles extends ACore_admin
{
	
	public function handler()
	{
		if ($_GET['del']) {
			$id_text = (int)$_GET['del'];
			$sql = "DELETE FROM articles WHERE id='$id_text'";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Удалено";
		 	header("Location:?option=admin");
		 	exit;
		 }
		} else {
			exit("Не верные данные");
		}
	}
	public function get_content()
	{
		# code...
	}
}
?>