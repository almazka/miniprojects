<?
/**
* username - нет такого поля, а я пытаюсь его выбрать
*/
try {
	$dbh = new PDO('sqlite:e:\databases\news.db');
	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT username FROM category";
	foreach ($dbh->query($sql) as $row) {
		print $row['name']." - ".$row['id']."<br>";
	}
	$dbh = null;
	
} catch (PDOException $e) {
echo "Ошибка PDO - ";
echo $e->getMessage();
}

	
?>