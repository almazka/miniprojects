<?php
	require 'eshop_db.inc.php';
	require 'eshop_lib.inc.php';

// Получение и фильтрация данных из формы
	$au = ClearData($_POST["author"]);
	$tit = ClearData($_POST["title"]);
	$puby = ClearData($_POST["pubyear"],"i");
	$pr = ClearData($_POST["price"],"i");

	save($au,$tit,$puby,$pr);
	header("Location: add2cat.php");
?>