<?php
class login extends ACore
{
	protected function handler()
	{
		$login = strip_tags(mysql_real_escape_string($_POST['login']));
		$password = strip_tags(mysql_real_escape_string($_POST['password']));
		if (!empty($login) AND !empty($password)) {
			$password = md5($password);
			$sql = "SELECT id FROM users WHERE username = '$login' AND password = '$password'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) == 1) {
			$_SESSION['user'] = TRUE;
			header("Location:?option=admin");
			exit();
		} else {
			exit("Нет такого пользователя");
		}
		} else {
			exit("Заполните обязательные поля!");
		}
	}
	public function get_content()
	{
		echo "<div id='mainarea'><div id='main'>";
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Имя пользователя:<br />
<input type='text' name='login'>
</p>
<p>Пароль:<br />
<input type='password' name='password'>
</p>
<p><input type='submit' name='button' value='Сохранить'></p></form>
HEREDOC;

		echo "</div></div>";
	}
}

?>