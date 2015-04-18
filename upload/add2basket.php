<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	$c = session_id(); // идентификатор пользователя
	$id = clearData($_GET["id"],"i"); // идентификатор товара
	$q = 1; // кол-во добавляемого товара (по 1 единице в 1 руки)
	$dt = time();

	add2basket($c, $id, $q, $dt);
	header("Location: catalog.php");
?>