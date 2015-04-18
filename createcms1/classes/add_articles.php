<?php
class add_articles extends ACore_admin
{
	protected function handler()
	{
		if (!empty($_FILES['img_src']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['img_src']['tmp_name'], 'file/'.$_FILES['img_src']['name'])) {
				exit("Не удалось загрузить изображение");
			}
		} else {
			exit("Необходимо загрузить изображение");
		}
		$img_src = "file/".$_FILES['img_src']['name'];
		$title = $_POST['title'];
		$date = date("Y-m-d",time());
		$description = $_POST['description'];
		$text = $_POST['text'];
		$categ = $_POST['categ'];
		if (empty($title) || empty($text) || empty($description)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "INSERT INTO articles (title,description,`text`,`date`,img_src,category_id) VALUES('$title','$description','$text','$date', '$img_src', '$categ')";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=add_articles");
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
		$categ = $this->get_categories();
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Заголовок статьи:<br />
<input type='text' name='title' style='width:420px;'>
</p>
<p>Изображение:<br />
<input type='file' name='img_src'>
</p>
<p>Краткое описание:<br />
<textarea name='description' cols='50' rows='7'></textarea>
</p>
<p>Текст:<br />
<textarea name='text' cols='50' rows='7'></textarea>
</p>
<select name='categ'>
HEREDOC;
	foreach ($categ as $value) {
		echo "<option value='".$value['id']."'>".$value['name']."</option>";
		
}
		echo "<select/><p><input type='submit' name='button' value='Сохранить'></p></form></div></div>";
	}
}

?>