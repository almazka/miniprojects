<?php
class delete_menu extends ACore_admin
{
	
	public function handler()
	{
		if ($_GET['del']) {
			$id_menu = (int)$_GET['del'];
			$sql = "DELETE FROM menu WHERE id='$id_menu'";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Удалено";
		 	header("Location:?option=edit_menu");
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