<?php
define("DB_HOST", "htdocs");
define("DB_LOGIN", "mysql");
define("DB_PASSWORD", "mysql");
define("DB_NAME", "gbook");
mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
function ClearData($data,$type = "s")
{
  switch ($type) {
    case 's':
      $data = trim(strip_tags($data));break;
    case 'i':
      $data = abs((int)$data);break;
  }
  return $data;
}
if (!empty($_POST['name']) and !empty($_POST[email])) {
  $n = ClearData($_POST['name']);
  $e = ClearData($_POST['email']);
  $m = ClearData($_POST['msg']);
  $sql = "INSERT INTO msgs (name,email,msg) VALUES('$n', '$e','$m')";
  mysql_query($sql) or die(mysql_error());
header("Location: gbook.php");
exit;
}
if (isset($_GET["del"])) {
  $id = ClearData($_GET["del"],"i");
  if ($id>0) {
    $sql = "DELETE FROM msgs WHERE id=$id";
    mysql_query($sql) or die(mysql_error());
    header("Location: gbook.php");
    exit;
  }
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

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя:<br />
<input type="text" name="name" /><br />
Ваш E-mail:<br />
<input type="text" name="email" /><br />
Сообщение:<br />
<textarea name="msg" cols="50" rows="5"></textarea><br />
<br />
<input type="submit" value="Добавить!" />

</form>

<?php
$sql = "SELECT * FROM msgs ORDER BY id DESC";
$users = mysql_query($sql) or die(mysql_error());
echo "<p>Всего записей: ".mysql_num_rows($users)."</p>";
mysql_close();
while ($user = mysql_fetch_assoc($users)) {
  $msg = nl2br($user["msg"]);
?>
<hr>
<p><a href='mailto:<?=$user["email"]?>'><?=$user["name"]?></a></p>
<p><?=$msg?></p>
<p align="right">
  <a href='gbook.php?del=<?=$user["id"]?>'>Delete</a>
</p>
<?php
}

/*
ЗАДАНИЕ 2
- Сформируйте SQL-оператор на выборку всех данных из таблицы
  msgs в обратном порядке и выполните его. Результат выборки
  сохраните в переменной.
- Закройте соединение с БД
- Получите количество рядов результата выборки и выведите его на экран
- В цикле получите очередной ряд результата выборки в виде ассоциативного массива.
  Таким образом, используя этот цикл, выведите на экран все сообщения, а также информацию
  об авторе каждого сообщения. После каджого сообщения сформируйте ссылку для удаления этой
  записи. Информацию об идентификаторе удаляемого сообщения передавайте методом GET.
*/
?>

</body>
</html>