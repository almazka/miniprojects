<html>
<head>
	<title>Форма добавления товара в каталог</title>
</head>
<body>
<h1>Шаг первый - добавление товаров в каталог:</h1>
	<form action="save2cat.php" method="post">
		<p>Автор: <input type="text" name="author" size="50">
		<p>Название: <input type="text" name="title" size="100">
		<p>Год издания: <input type="text" name="pubyear" size="4">
		<p>Цена: <input type="text" name="price" size="6"> руб.
		<p><input type="submit" value="Добавить">
	</form>
	<h1>Шаг 2 - </h1>
	<a href="catalog.php">Выбрать из каталога товары и купить через корзину</a>
	<h1>Содержание:</h1>
	<ol>
		<li><a href="eshop_lib.inc.php">Файл библиотеки функций (инклюдим)</a></li>
		<li><a href="eshop_db.inc.php">Файл c данными соединения c БД (инклюдим)</a></li>
		<li><a href="save2cat.php">Файл получания инфы при сохранении товара в каталог</a></li>
		<li><a href="catalog.php">Каталог</a></li>
		<li><a href="basket.php">Страничка корзины</a></li>
		<li><a href="add2basket.php">Страница приема данных для корзины</a></li>
		<li><a href="delete_from_basket">Страничка отправки данных для удаления товаров из корзины</a></li>
		<li><a href="orderform.php">Страничка с формой заказа</a></li>
		<li><a href="saveorder.php">Страничка для приема данных пользователя</a></li>
		<li><a href="orders.php">Страничка перечня заказов</a></li>
	</ol>
</body>
</html>