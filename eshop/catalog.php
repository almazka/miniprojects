<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
</head>
<body>
<?php
echo "Товаров в <a href='basket.php'>корзине</a>: $count";
/*
ЗАДАНИЕ 1
- Выведите в этом месте строку "Товаров в корзине: "
	и текущее количество товаров в корзине для
	данного пользователя
- Слово "корзине" оформите в виде гиперссылки на
	документ basket.php
*/
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
$all_catalog = SelectAll();
if (is_array($all_catalog)) {
	foreach ($all_catalog as $value) {?>
		<tr>
			<td><?=$value['author'];?></td>
			<td><?=$value['title'];?></td>
			<td><?=$value['pubyear'];?></td>
			<td><?=$value['price'];?></td>
			<td><a href="add2basket.php?id=<?=$value['id']?>">В корзину</a></td>
		</tr>
	<?}
}
?>
</table>
</body>
</html>