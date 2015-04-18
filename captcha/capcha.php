<?php
session_start();
$result = "";
define('DB_HOST', 'card-index');
define('DB_LOGIN', 'mysql');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'capcha');
mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD);
mysql_select_db(DB_NAME) or die(mysql_error());
function ClearData($data)
{
    return trim(strip_tags($data));
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if (isset($_SESSION["randStr"])) {
	if (!empty($_POST["name"]) and !empty($_POST["email"]) and isset($_POST["msg"]) and !empty($_POST["capchacode"])) {
  $usernm = ClearData($_POST["name"]);
  $userem = ClearData($_POST["email"]);
  $usertxt = ClearData($_POST["msg"]);
  $usercode = ClearData($_POST["capchacode"]);
  if ($_SESSION["randStr"] == $usercode) {
  	$sql = "INSERT INTO message (name,email,msg) VALUES('$usernm', '$userem','$usertxt')";
  mysql_query($sql) or die(mysql_error());
header("Location: capcha.php");
exit;
  } else {
  	$result = "Ошибка: Неверный код с картинки!";
  }
} else {
	$result = "Ошибка: Не заполнено одно или несколько обязательных полей!";
}
} else {
	$result = "Ошибка: Включи графику";
}
}


if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $sql = "DELETE FROM message WHERE id=$del_id";
  mysql_query($sql) or die(mysql_error());
  header("Location: capcha.php");
  exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Гостевая книга</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Гостевая книга</h1>
<i style="color: #FD6500"><?=$result?></i>
<br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя*:<br />
<input type="text" name="name" /><br />
Ваш E-mail*:<br />
<input type="text" name="email" /><br />
Сообщение:<br />
<textarea name="msg" cols="50" rows="5"></textarea><br />
<b style="display: block; float: left; margin-right: 20px; padding-top: 15px">Введите текст с картинки*:</b><img style="display: block" src="capchaimg.php">
<input type="text" name="capchacode" style="
    padding: 6px;
    font-size: 16px" />
<p>
<input type="submit" value="Добавить!" />
</p>

</form>
<hr>

<?php
$sql = "SELECT * FROM message ORDER BY id desc";
$selected = mysql_query($sql) or die(mysql_error());
echo "Количество записей - ".mysql_num_rows($selected)."<br>";
mysql_close();
while ($arrselected = mysql_fetch_assoc($selected)) {
$msg = nl2br($arrselected['msg']);
  ?>
    <p>Сообщение от <?=$arrselected["name"]?> (<?=$arrselected["email"]?>) - <a href="capcha.php?del=<?=$arrselected['id']?>">удалить</a>:<p><?=$msg?></p><hr>
    <?php
 }
?>

</body>
</html>