<?php
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', 'rafikider');
define('DB_NAME', 'eshop');
define('ORDERS_LOG', 'orders.log');
mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD);
mysql_select_db(DB_NAME) or die(mysql_error());

// число записей в корзине
$count = 0;
$sql = "SELECT count(*) FROM basket WHERE customer='".session_id()."'";
$res = mysql_query($sql) or die(mysql_error());
$count = mysql_result($res, 0, "count(*)");
?>