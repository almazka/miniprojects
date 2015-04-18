<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	if (isset($_POST["name"]) and isset($_POST["email"]) and isset($_POST["phone"]) and isset($_POST["address"])) {
		$name = ClearData($_POST["name"]);
		$email = ClearData($_POST["email"]);
		$phone = ClearData($_POST["phone"]);
		$address = ClearData($_POST["address"]);
	}
	$timeorder = time();
	$ses_id = session_id();
	$order = "$name | $email | $phone | $address | $ses_id | $timeorder";
	file_put_contents(ORDERS_LOG, "$order\n", FILE_APPEND);
	resave($timeorder);
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