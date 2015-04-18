<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	$id = ClearData($_GET["id"],'i');
	basketDel($id);
	header("Location: basket.php");
	/*
	ЗАДАНИЕ 1
	- Получите идентификатор удаляемого товара
	- Вызовите функцию basketDel() для данного товара
	- Переадресуйте пользователя на корзину заказов
	*/
?>