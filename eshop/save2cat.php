<?php
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	if (isset($_POST["author"]) and isset($_POST["title"]) and isset($_POST["pubyear"]) and isset($_POST["price"])) {
		$author = ClearData($_POST["author"]);
		$title = ClearData($_POST["title"]);
		$pubyear = ClearData($_POST["pubyear"],"i");
		$price = ClearData($_POST["price"],"i");
	save($author,$title,$pubyear,$price);
	header("Location: add2cat.php");
	}
?>