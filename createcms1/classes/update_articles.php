<?php
class update_articles extends ACore_admin
	{
		protected function handler()
	{
		if (!empty($_FILES['img_src']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['img_src']['tmp_name'], 'file/'.$_FILES['img_src']['name'])) {
				exit("Не удалось загрузить изображение");
			}

		}
		$id = $_POST['id'];
		$img_src = "file/".$_FILES['img_src']['name'];
		$title = $_POST['title'];
		$date = date("Y-m-d",time());
		$description = $_POST['description'];
		$text = $_POST['text'];
		$categ = $_POST['categ'];
		if (empty($title) || empty($text) || empty($description)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE articles SET title='$title', img_src='$img_src', date='$date', text='$text', description='$description',category_id='$categ' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=admin");
		 	exit;
		 }
	}
	public function get_content()
	{
		if ($_GET['id']) {
			$id_text = (int)$_GET['id'];
		} else {
			exit("Не правильные данные");
		}
		$text = $this->get_text_article($id_text);
		echo "<div id='mainarea'><div id='main'>";
		if ($_SESSION["res"]) {
			echo $_SESSION["res"];
			unset($_SESSION["res"]);
		}
		$categ = $this->get_categories();
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Заголовок статьи:<br />
<input type='text' name='title' style='width:420px;' value='$text[title]'>
<input type='hidden' name='id' style='width:420px;' value='$text[id]'>
</p>
<p>Изображение:<br />
<input type='file' name='img_src'>
</p>
<p>Краткое описание:<br />
<textarea name='description' cols='50' rows='7'>$text[description]</textarea>
</p>
<p>Текст:<br />
<textarea name='text' cols='50' rows='7'>$text[text]</textarea>
</p>
<select name='categ'>
HEREDOC;
	foreach ($categ as $value) {
		if ($text['category_id'] == $value['id']) {
			echo "<option selected value='".$value['id']."'>".$value['name']."</option>";
		}
		echo "<option value='".$value['id']."'>".$value['name']."</option>";
}
		echo "<select/><p><input type='submit' name='button' value='Сохранить'></p></form></div></div>";
	}
	}

?>