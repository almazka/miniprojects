<?php
// подключение библиотек
	require "dz.lib.php";
?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<link rel="stylesheet" type="text/css" href="template_styles.css">
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<title>Сборник разных крутых фич</title>
</head>
<body>
<a href="adddz.php">Страница загрузки новых фич</a>
<hr width="40%" align="left">
<p>Внимание! Нерешенные вопросы:
<ul>
	<li>Папка /dz2/mod2/session/ Так и не знаю, как сразу в массив загнать это сесионное значение</li>
	<li>/mod2/if.php Не работает if, хотела там по-крутому сделать из POST, ан не работает</li>
	<li>Развитие интернет-магазина. 
	<ol>
		<li>Нужно сделать изменяемое количество товаров, чтобы в корзине можно было менять и сохранять</li>
		<li>Сделать возможность внесения изменений в каталог и пересохранения</li>
		<li>Фишка с регистрацией, сделать, чтобы заказы незарегестрированных очищались, сессионные файлы удалялись, а зарегенные, если не дозаказали, при следующем заказе видели бы содержимое своей корзины</li>
		<li>Сделать группы пользователей. Для каждого пользователя свои возможности, менеджеры, юзеры, админы что могут менять, что показывается, что нет</li>
	</ol>
<li>
	Ошибка какая-то непонятная при запуске файла client.php, там тема сервисов и я ее не очень поняла, разобраться не могу, там еще принимает участие файл stock.wsdl
</li>
<li>
	Недоизуала тему RPC, ничего не понятно... плюнула
</li>
<li>Надо довести до ума файл PDONewsDB.class-IteratorAggregate-ArrayIterator, там перевести написание с обычного SQlite на PDO, начала и не закончила. Довести до ума, чтобы все работало, запись - вывод новостей</li>	
</ul>
</p>
<hr width="40%" align="left">
<h3>Загруженные фичи:</h3>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
	<th>Ссылка</th>
	<th>Аватарка</th>
</tr>
<?php
$fichiarray = myFichi();
foreach ($fichiarray as $item) {
?>
	<tr>
		<td><a href=<?=$uploaddir.$item["link"]?>><?=$item["trixname"]?></a> </td>
		<td><img src=<?=$uploaddir.$item["image"]?> >
		</td>
	</tr>
	<?php
}
	?>
</table>
<hr width="40%" align="left">
<a href="adddz.php">Страница загрузки новых фич</a>
</body>
</html>