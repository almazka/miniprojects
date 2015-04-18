<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
</head>
<body>
<?php
if ($count) {
	echo "Вернуться в <a href='catalog.php'>Каталог</a>";
}
else {
	echo "Корзина пуста. Вернуться в <a href='catalog.php'>Каталог</a>";
}
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php
$all_basket = myBasket();
if (is_array($all_basket)) {
	$i = 1;
	$sum = 0;
	foreach ($all_basket as $value) {?>
		<tr>
			<td><?=$i++;?></td>
			<td><?=$value['author'];?></td>
			<td><?=$value['title'];?></td>
			<td><?=$value['pubyear'];?></td>
			<td><?=$value['price'];?></td>
			<td><?=$value['quantity'];?></td>
			<td><a href="delete_from_basket.php?id=<?=$value['id']?>">Удалить</a></td>
		</tr>
	<?php 
	$sum+=$value['price']*$value['quantity'];
}}
?>
</table>

<p>Всего товаров в корзине на сумму: <?=$sum?> руб.

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'">
</div>

</body>
</html>







