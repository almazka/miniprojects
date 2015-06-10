<?php
class delete_category extends ACore_admin
{
	
	public function handler()
	{
		if ($_GET['del']) {
			$id_category = (int)$_GET['del'];
			$sql = "DELETE FROM category WHERE id='$id_category'";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Удалено";
		 	header("Location:?option=edit_category");
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