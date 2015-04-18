<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	$customer = session_id();
	if (isset($_GET["id"])) {
		$goodsid = ClearData($_GET["id"],"i");
	}
	$quantity = 1;
	$datetime = time();
	add2basket($customer, $goodsid, $quantity, $datetime);
	header("Location: catalog.php");
?>