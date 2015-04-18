<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	$n = ClearData($_POST["name"], "sf");
	$e = ClearData($_POST["email"], "sf");
	$p = ClearData($_POST["phone"], "sf");
	$a = ClearData($_POST["address"], "sf");
	$c = session_id();
	$dt = time();
	$order = "$n | $e | $p | $a | $c | $dt\n";
	file_put_contents(ORDERS_LOG, $order, FILE_APPEND);
	resave($dt);
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Каталог товаров</a></p>
</body>
</html>