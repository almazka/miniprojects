<?php
class view extends ACore
{
	
	public function get_content()
	{
		if (!$_GET['id']) {
			echo "Не правильные данные для вывода статьи";
		} else {
			$id_text = (int)$_GET['id'];
		}
		if (!$id_text) {
			echo "Не правильные данные для вывода статьи";
		}
		$sql = "SELECT title,text,date,img_src FROM articles WHERE id='$id_text'";
		$result = mysql_query($sql) or die(mysql_error());
		$result = db2array($result);
		foreach ($result as $value) {
			echo "<div id='mainarea'><h2>".$value['title']."</h2><p class='textarea'><img style='margin-right=5px;' src='".$value['img_src']."'></p><p>".$value['text']."</p></div>";
		}
	}
}
?>