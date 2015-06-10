<?php
class model
{
	
	protected $db;
	
	public function __construct()
	{
		$this->db = mysql_connect(HOST,USER,PASSWORD,DB_NAME) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	}
	public function db2array($data)
		{
		$arr = array();
		while ($row = mysql_fetch_assoc($data)) {
			$arr[] = $row;
		}
		return $arr;
		}
	public function get_left_bar()
	{
		$sql = "SELECT id, name FROM category";
		$result = mysql_query($sql) or die (mysql_error());
		$result = $this->db2array($result);
		return $result;
	}

	public function menu_array()
	{
		$sql = "SELECT id, name FROM menu";
		$result = mysql_query($sql) or die (mysql_error());
		$result = $this->db2array($result);
		return $result;
	}
	
	public function get_main_content()
	{
		$sql = "SELECT id, title,description,date,img_src FROM articles ORDER BY date DESC";
		$result = mysql_query($sql) or die(mysql_error());
		$result = $this->db2array($result);
		return $result;
	}
	public function get_view_content($id_text) {
		$sql = "SELECT title,text,date,img_src FROM articles WHERE id='$id_text'";
		$result = mysql_query($sql) or die(mysql_error());
		$result = $this->db2array($result);
		return $result;
	}
	
	public function get_category_content($id_cat)
	{
		$sql = "SELECT id,title,description,date,img_src FROM articles WHERE category_id='$id_cat' ORDER BY date DESC";
		$result = mysql_query($sql) or die(mysql_error());
		$result = $this->db2array($result);
		return $result;
	}
	public function get_menu_content($id_menu)
	{
		$sql = "SELECT id,name,text FROM menu WHERE id='$id_menu'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		return $row;
	}
	public function get_admin_content() {
		$sql = "SELECT id, title FROM articles";
    	$result = mysql_query($sql) or die(mysql_error());
    	$result = $this->db2array($result);
		return $result;
	}
	public function get_categories()
	{
		$sql = "SELECT id, name FROM category";
		$result = mysql_query($sql) or die(mysql_error());
		$result = $this->db2array($result);
		return $result;
	}
	public function get_text_article($id)
	{
		$sql = "SELECT id, title, description, text, category_id FROM articles WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function get_text_menu($id)
	{
		$sql = "SELECT id, name, text FROM menu WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function get_text_category($id)
	{
		$sql = "SELECT id, name FROM category WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function update_article() {
		if (!empty($_FILES['img_src']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['img_src']['tmp_name'], 'file/'.$_FILES['img_src']['name'])) {
				exit("Не удалось загрузить изображение");
			}
		$img_src = "file/".$_FILES['img_src']['name'];
		}
		$id = $_POST['id'];
		
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
	public function update_category() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		if (empty($name)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE category SET name='$name' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=edit_category");
		 	exit;
		 }
	}
	public function update_menu() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$text = $_POST['text'];
		if (empty($name) || empty($text)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE menu SET name='$name', text='$text' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=edit_menu");
		 	exit;
		 }
	}
	public function add_article() {
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
	public function add_category() {
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
	public function add_menu() {
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
	public function delete_article() {
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
	public function delete_category() {
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
	public function delete_menu() {
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
}
	
?>