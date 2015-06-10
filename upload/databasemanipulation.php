<h1>Играем с БД</h1>
<?php
mysql_connect("localhost","root","rafikider");
mysql_select_db("web") or die(mysql_error());
mysql_query("SET NAMES 'utf8'") or die(mysql_error());

$sql = "SELECT * FROM teachers";
$result = mysql_query($sql);

mysql_close();
echo "Количество полей в таблице: ".mysql_num_fields($result)."<br>";
echo "Поле номер 3 называется: ".mysql_field_name($result, 3)."<br>";
echo "А записей в таблице ".mysql_num_rows($result);
echo "<hr>";
while ($row = mysql_fetch_assoc($result)) {
 	echo $row[name]."<br>";
 }