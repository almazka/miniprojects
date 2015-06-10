<h1>Создание БД из PHP</h1>
<i>Вот код как он есть (кавычки экранированы):</i>
<?php
echo "mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysql_error());

$sql = \'CREATE DATABASE gbook\';
mysql_query($sql) or die(mysql_error());

mysql_select_db(\'gbook\') or die(mysql_error());

$sql = \"
CREATE TABLE msgs (
	id int(11) NOT NULL auto_increment,
	name varchar(50) NOT NULL default \'\',
	email varchar(50) NOT NULL default \'\',
	msg TEXT,
	PRIMARY KEY (id)
)\";
mysql_query($sql) or die(mysql_error());

mysql_close();

print \'Структура базы данных успешно создана!\';";
?>