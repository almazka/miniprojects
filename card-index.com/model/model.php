<?php
class model
{
	
	protected $db;
	
	public function __construct()
	{
		$this->db = mysql_connect(HOST,USER,PASSWORD,DB_NAME) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	}
	public function db2array($data)
		{
		$arr = array();
		while ($row = mysql_fetch_assoc($data)) {
			$arr[] = $row;
		}
		return $arr;
		}
	public function get_tags()
	{
		$sql = "SELECT id, name, count FROM tags WHERE count>'0'  ORDER BY name";
		$result = mysql_query($sql) or die (mysql_error());
		return $this->db2array($result);
	}
	public function get_all_tags()
	{
		$sql = "SELECT id, name, count FROM tags ORDER BY name";
		$result = mysql_query($sql) or die (mysql_error());
		return $this->db2array($result);
	}
	public function category_array()
	{
		$sql = "SELECT id, name FROM category";
		$result = mysql_query($sql) or die (mysql_error());
		return $this->db2array($result);
	}
	
	public function get_main_content()
	{
		$sql = "SELECT id, title FROM notes ORDER BY title";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_project_tag($id) {
		$sql = "SELECT id, name,tags FROM project WHERE id='$id' ORDER BY name";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_view_project($id_text) {
		$sql = "SELECT id,name,file_view,other_files FROM project WHERE id='$id_text'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function get_notes_cat_content($id) {
		$sql = "SELECT id, title, category_id FROM notes WHERE category_id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_project_cat_content($id) {
		$sql = "SELECT id, name, id_category FROM project WHERE id_category='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_category_content($id)
	{
		$notes = $this->get_notes_cat_content($id);
		$project = $this->get_project_cat_content($id);
		foreach ($notes as $value) {
			$lnk .= "<li><a href='?option=notes_view&id=".$value['id']."'>".$value['title']."</a></li>";
		}
		foreach ($project as $value) {
			$lnk .= "<li><a href='?option=project_view&id=".$value['id']."'>".$value['name']."</a></li>";	
		}
		return $lnk;
	}
	public function get_notes_content() {
		$sql = "SELECT id, title, tags FROM notes ORDER BY title";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_project_content() {
		$sql = "SELECT id, name, tags FROM project ORDER BY name";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_tags_content($id) {
		$tagname = $this->get_text_tags($id);
		$tagname = $tagname['name'];
		$tagcount = $tagname['count'];
		$notes = $this->get_notes_content();
		$project = $this->get_project_content();
		$search = "/".$tagname."/";
		$lnk = "";
		$i = 0;
		foreach ($notes as $value) {
		if (preg_match_all($search,$value['tags'],$array)) {
		$lnk .= "<li><a href='?option=notes_view&id=".$value['id']."'>".$value['title']."</a></li>";}
		$i++;
		}
		foreach ($project as $value) {
		$tags = $value["tags"];
		if (preg_match_all($search,$value['tags'],$array)) {
		$lnk .= "<li><a href='?option=project_view&id=".$value['id']."'>".$value['name']."</a></li>";
		$i++;}
		} 
/*		if ($i !== $tagcount) {
			$sql = "UPDATE tags SET count='$i' WHERE name='tagname'";
			$result = mysql_query($sql) or die(mysql_error());
		}  */
		return $lnk;
	}
	public function get_categories()
	{
		$sql = "SELECT id, name FROM category";
		$result = mysql_query($sql) or die(mysql_error());
		return $this->db2array($result);
	}
	public function get_text_project($id)
	{
		$sql = "SELECT id, name, tags FROM project WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function get_text_notes($id_text) {
		$sql = "SELECT id,title,text,category_id,tags FROM notes WHERE id='$id_text'";
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
	public function get_text_tags($id)
	{
		$sql = "SELECT id, name, count FROM tags WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
		public function get_project_tags($id) {
		$sql = "SELECT id, tags FROM project WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function get_notes_tags($id) {
		$sql = "SELECT id, tags FROM notes WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	public function insert_tags() {
	if (isset($_POST["tags"])) {
		$tags = $_POST["tags"];
		$chars = explode(",", $tags);
		$i=0;
	do {
	$result_chars = trim($chars[$i]);
	$sql = "SELECT name, count FROM tags WHERE name='$result_chars'";
	$result_choice_up = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result_choice_up)>0) {
    $myrow_choice_up = mysql_fetch_array($result_choice_up);
    $new_count = $myrow_choice_up["count"]+1;
    $result = mysql_query ("UPDATE tags SET count='$new_count' WHERE name='$result_chars'");
    $i++;
    }
    else {
    	$result = mysql_query("INSERT INTO tags (name, count) VALUES ('$result_chars', 1)");
    	$i++;
    }}
    while ($chars[$i]!="");
	}
	}
	public function tags_deduct_project($id) {
		$tags_project = $this->get_project_tags($id);
		$tag_str = $tags_project['tags'];
		$chars = explode(",", $tag_str);
		$i=0;
	do {
	$result_chars = trim($chars[$i]);
	$sql = "SELECT name, count FROM tags WHERE name='$result_chars'";
	$result_choice_up = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result_choice_up)>0) {
    $myrow_choice_up = mysql_fetch_array($result_choice_up);
    $new_count = $myrow_choice_up["count"]-1;
    $result = mysql_query ("UPDATE tags SET count='$new_count' WHERE name='$result_chars'");
    $i++;
    }
    }
    while ($chars[$i]!="");
	}
	public function tags_deduct_notes($id) {
		$tags_notes = $this->get_notes_tags($id);
		$tag_str = $tags_notes['tags'];
		$chars = explode(",", $tag_str);
		$i=0;
	do {
	$result_chars = trim($chars[$i]);
	$sql = "SELECT name, count FROM tags WHERE name='$result_chars'";
	$result_choice_up = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result_choice_up)>0) {
    $myrow_choice_up = mysql_fetch_array($result_choice_up);
    $new_count = $myrow_choice_up["count"]-1;
    $result = mysql_query ("UPDATE tags SET count='$new_count' WHERE name='$result_chars'");
    $i++;
    }
    }
    while ($chars[$i]!="");
	}
		/*if(mysql_num_rows($result_choice_up)>0) {

		} else {
        $sql = "INSERT INTO tags (name) VALUES ('$result_chars')";
        $result = mysql_query($sql) or die(mysql_error());
        $i++;
	    }}
	    while ($chars[$i]!="");
	    }*/
		
	public function update_notes() {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$text = $_POST['text'];
		$categ = $_POST['categ'];
		if (empty($title) || empty($text)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE notes SET title='$title', text='$text', category_id='$categ' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=edit_notes");
		 	exit;
		 }
	}
	public function update_project() {
		if (!empty($_FILES['img_src']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['img_src']['tmp_name'], FOLDER.$_FILES['img_src']['name'])) {
				exit("Не удалось загрузить изображение");
			}
		$img_src = FOLDER.$_FILES['img_src']['name'];
		}
		$id = $_POST['id'];
		
		$title = $_POST['title'];
		$date = date("Y-m-d",time());
		$text = $_POST['text'];
		$categ = $_POST['categ'];
		if (empty($title) || empty($text)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE notes SET title='$title', img_src='$img_src', date='$date', text='$text', id='$categ' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=admin");
		 	exit;
		 }
	}
	public function update_tags() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		if (empty($name)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "UPDATE tags SET name='$name' WHERE id='$id' ";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=edit_tags");
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

	/*
-------

do {
$result_chars = trim($chars[$i]);
$result_choice_up = mysql_query("SELECT tag_name, count FROM tags WHERE tag_name='$result_chars'");
if(mysql_num_rows($result_choice_up)>0) {
        $myrow_choice_up = mysql_fetch_array($result_choice_up);
        $new_count = $myrow_choice_up["count"]+1;
        $result = mysql_query ("UPDATE tags SET count='$new_count' WHERE tag_name='$result_chars'");
        $i++;
    }
    else {
    	$result = mysql_query("INSERT INTO tags (tag_name, count) VALUES ('$result_chars', 1)",$db);
    	$i++;
    }}
    while ($chars[$i]!="");




-------

*/
	public function add_notes() {
		$tags = $_POST['tags'];
		$title = $_POST['title'];
		$text = $_POST['text'];
		$categ = $_POST['categ'];
		
		if (empty($title) || empty($text)) {
			exit("Не заполнены обязательные поля!");
		}
		$sql = "INSERT INTO notes (title,`text`,category_id,tags) VALUES('$title','$text','$categ','$tags')";
		$this->insert_tags();
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=add_notes");
		 	exit;
		 }
		
	}
	public function add_project() {
		$tags = $_POST['tags'];
		$nf = $_POST['namefolder'];
		if (!is_dir(FOLDER.$nf)) {
			mkdir(FOLDER.$nf);
		}
		if (!empty($_FILES['file_view']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['file_view']['tmp_name'], FOLDER.$nf.'/'.$_FILES['file_view']['name'])) {
				exit("Не удалось загрузить файл");
			}
		} else {
			exit("Необходимо загрузить ключевой файл");
		}

		if (!empty($_FILES['userfile']['tmp_name'])) {
			foreach($_FILES['userfile']['name'] as $k=>$f) {
		  if (!$_FILES['userfile']['error'][$k]) {
		    if (!move_uploaded_file($_FILES['userfile']['tmp_name'][$k], FOLDER.$nf.'/'.$_FILES['userfile']['name'][$k])) {
		    	exit("Не удалось загрузить");
		    }
		  }
		}
    $file_ary = reArrayFiles($_FILES['userfile']);
    $allfiles = "";
    foreach ($file_ary as $file) {
        $allfiles .= FOLDER.$nf."/".$file['name'].",";
    }
	$allfiles = rtrim($allfiles, ",");
} else {
	$allfiles = "";
}
	$file_view = FOLDER.$nf."/".$_FILES['file_view']['name'];
	$name = $_POST['name'];
	$categ = $_POST['categ'];
	if (empty($name) || empty($nf) || empty($_FILES['file_view']['tmp_name'] )) {
		exit("Не заполнены обязательные поля!");
	}
	$sql = "INSERT INTO project (name,file_view,other_files, id_category, tags) VALUES('$name','$file_view','$allfiles','$categ','$tags')";
	$this->insert_tags();
	if (!mysql_query($sql)) {
	 	mysql_error();
	 } else {
	 	$_SESSION["res"] = "Изменения сохранены";
	 	header("Location:?option=edit_project");
	 	exit;
	 }
	}
	public function add_tags() {
		$name = $_POST['tags'];
		
		if (empty($name)) {
			exit("Введите имя нового тега");
		}
		
		if ($this->insert_tags()) {
		 	$_SESSION["res"] = "Изменения сохранены";
		 	header("Location:?option=add_tags");
		 	exit;
		 }
	}
	public function add_category() {
		$name = $_POST['name'];
		if (empty($name)) {
			exit("Не заполнены обязательные поля!");
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
	public function delete_project() {
		if ($_GET['del']) {
			$id = (int)$_GET['del'];
			$this->tags_deduct_project($id);
			$sql = "DELETE FROM project WHERE id='$id'";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Проект удален";
		 	header("Location:?option=edit_project");
		 	exit;
		 }
		} else {
			exit("Не верные данные");
		}
	}
	public function delete_notes() {
		if ($_GET['del']) {
			$id = (int)$_GET['del'];
			$this->tags_deduct_notes($id);
		/*	$tags_notes = $this->get_notes_tags($id);
			$tag_str = $tags_notes['tags'];

			$tagnames = $this->get_tags();
			foreach ($tagnames as $value) {
				$tagname = $value['name'];
				$search = "/".$tagname."/";
				if (preg_match_all($search,$tag_str,$array)) {
			    $new_count = $value["count"]-1;
			    $result = mysql_query ("UPDATE tags SET count='$new_count' WHERE name='$tagname'");
				}
			}
			
			*/


			$sql = "DELETE FROM notes WHERE id='$id'";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Заметка удалена";
		 	header("Location:?option=edit_notes");
		 	exit;
		 }
		} else {
			exit("Не верные данные");
		}
	}
	public function delete_tags() {
		if ($_GET['del']) {
			$id_tags = (int)$_GET['del'];
			$sql = "DELETE FROM tags WHERE id='$id_tags'";
		if (!mysql_query($sql)) {
		 	mysql_error();
		 } else {
		 	$_SESSION["res"] = "Удалено";
		 	header("Location:?option=edit_tags");
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
}
	
?>