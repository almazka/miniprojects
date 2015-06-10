<?php
abstract class ACore_admin
{
	protected $db;
	public function __construct()
	{
		if (!$_SESSION['user']) {
			header("Location:?option=login");
		}
		$this->db = mysql_connect(HOST,USER,PASSWORD,DB_NAME) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	}
	protected function get_header()
	{
		include 'header.php';
	}
	protected function get_left_bar()
	{
		echo '<div class="menu_left">
		<div id="spacer" style="margin-bottom:15px;">
			<div id="rc-bg"></div>
		</div>
		<ul class="quick-links">
		<li><a href="?option=main">Выйти на главную</a></li>
		<li>
		<a href="?option=admin">Ред. статей</a>
		</li>
		<li>
		<a href="?option=edit_menu">Ред. меню</a>
		</li>
		<li>
		<a href="?option=edit_category">Ред. категории</a>
		</li>
		</ul></div>';
	}
	protected function get_menu()
	{
			echo '<ul class="heading"></ul>';

	}
	protected function get_footer()
	{
		echo "<div id='bottom'></div><div class='copy'><span class='style1'>&copy; SuperWebmaster,  ".date(Y)."<hr>Powered by".$_SERVER['SERVER_SOFTWARE']."</span></div></div></center></body></html>";
	}
	public function get_body()
	{
		if ($_POST || $_GET['del']) {
			$this->handler();
		}
		$this->get_header();
		$this->get_menu();
		$this->get_left_bar();
		
		$this->get_content();
		$this->get_footer();
	}
	abstract function get_content();
	protected function get_categories()
	{
		$sql = "SELECT id, name FROM category";
		$result = mysql_query($sql) or die(mysql_error());
		$result = db2array($result);
		return $result;
	}
	protected function get_text_article($id)
	{
		$sql = "SELECT id, title, description, text, category_id FROM articles WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	protected function get_text_menu($id)
	{
		$sql = "SELECT id, name, text FROM menu WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
	protected function get_text_category($id)
	{
		$sql = "SELECT id, name FROM category WHERE id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$text = array();
		$text = mysql_fetch_array($result,MYSQL_ASSOC);
		return $text;
	}
}
?>