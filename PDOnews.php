<?php
require 'PDONewsDB.class-IteratorAggregate-ArrayIterator.php';
$news = new NewsDB;
$errMsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include 'PDOsave_news.php';
}
?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 5 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<title>Новостная лента</title>
</head>
<body>
<h1>Последние новости</h1>
<?php
if ($errMsg) {
	echo "Ошибка! ".$errMsg;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h2>Заголовок новости:</h2>
<input type="text" name="title" /><br/>
<h2>Выберите категорию:</h2>
<select name="category">
	<?php
	foreach ($news as $v => $n) {
		echo "<option value='$v'>$n</option>\n";
	}

	?>
</select>
<h2>Текст новости:</h2>
<textarea name="description" cols="30" rows="5"></textarea>
<h2>Источник:</h2>
<input type="text" name="source">
<hr/>
<input type="submit" value="Добавить!">
</form>
<?php
include 'get_news.php';
if (isset($_GET['del'])) {
	include 'delete_news.php';
}
?>
</body>
</html>