<?php
// Создание структуры Базы Данных гостевой книги

define("DB_HOST", "localhost");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "rafikider");

mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysql_error());

$sql = 'CREATE DATABASE capcha';
mysql_query($sql) or die(mysql_error());

mysql_select_db('capcha') or die(mysql_error());

$sql = "
CREATE TABLE message (
	id int(11) NOT NULL auto_increment,
	name varchar(50) NOT NULL default '',
	email varchar(50) NOT NULL default '',
	msg TEXT,
	PRIMARY KEY (id)
)";
mysql_query($sql) or die(mysql_error());

mysql_close();

print '<p>Структура базы данных успешно создана!</p>';
?>