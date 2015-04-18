<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Поступившие заказы</title>
</head>
<body>
<h2>Поступившие заказы:</h2>
<?php
$getord = getOrders();
if (is_array($getord)) {
	foreach ($getord as $value) { ?>
	<hr>
	<p><b>Заказчик</b>: <?=echo $value['name']?></p>
	<p><b>Email</b>: <?=echo $value['email']?></p>
	<p><b>Телефон</b>: <?=echo $value['phone']?></p>
	<p><b>Адрес доставки</b>: <?=echo $value['adress']?></p>
	<p><b>Дата размещения заказа</b>: <?=echo date("d-m-Y H:i:s", $value['datetime'])?></p>
	<h3>Купленные товары:</h3>

<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N п/п</th>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
</tr>
<?php 
foreach ($getord["goods"] as $value) { 
	$i = 1;
	$sum = 0;
	?>
<tr>
	<td><?=$i?></td>
	<td><?=$value["author"]?></td>
	<td><?=$value["title"]?></td>
	<td><?=$value["pubyear"]?></td>
	<td><?=$value["price"]?></td>
	<td><?=$value["quantity"]?></td>
</tr>
<?php
$i++;
$sum+=$value['price']*$value['quantity'];
}
?>
</table>

<p>Всего товаров в заказе на сумму: <?=$sum?> руб.

<?php
}
}
?>
</body>
</html>