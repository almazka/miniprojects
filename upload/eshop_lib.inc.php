<?php
function ClearData($data, $type="s")
{
	switch ($type) {
		case 's':
			return mysql_real_escape_string(trim(strip_tags($data)));
			case 'sf':
				return trim(strip_tags($data));
		case 'i':
			return (int)$data;
	}
}
function save($author, $title, $pubyear, $price)
{
	$sql = "INSERT INTO catalog (author,title,pubyear,price) VALUES('$author', '$title','$pubyear', '$price')";
	mysql_query($sql) or die(mysql_error());
}
// конвертируем данные в массив
function db2array($data)
{
	$arr = array();
	while ($row = mysql_fetch_assoc($data)) {
		$arr[] = $row;
	}
	return $arr;
}
// возвращение всего содержимого из каталога товаров в виде массива
function selectAll()
{
	$sql = "SELECT * FROM catalog";
	$result = mysql_query($sql) or die(mysql_error());
	return db2array($result);
}
	
// добавление товаров в корзину пользователя
function add2basket($customer, $goodsid, $quantity, $datetime)
{
	$sql = "INSERT INTO basket (customer, goodsid, quantity, datetime) VALUES ('$customer', $goodsid, $quantity, $datetime)";
	mysql_query($sql) or die(mysql_error());
}

// возвращение всей пользовательской корзины в виде массива
	function myBasket()
	{
		$sql = "SELECT author,title,pubyear,price, basket.id,goodsid,customer,quantity FROM catalog,basket WHERE customer='".session_id()."' AND catalog.id=basket.goodsid";
		$result = mysql_query($sql) or die(mysql_error());
		return db2array($result);
	}
	
// удаление товара из корзины пользователя
function basketDel($id)
{
	$sql = "DELETE FROM basket WHERE id=$id";
	mysql_query($sql) or die(mysql_error());
}
function resave($dt)
{
	$goods = myBasket();
	foreach ($goods as $item) {
		$sql = "INSERT INTO orders (author, title, pubyear, price, customer, quantity, datetime) VALUES ('{$item["author"]}', '{$item["title"]}', {$item["pubyear"]}, {$item["price"]}, '{$item["customer"]}', {$item["quantity"]}, $dt)";
	mysql_query($sql) or die(mysql_error());
	}
	$sql = "DELETE FROM basket WHERE customer='".session_id()."'";
	mysql_query($sql) or die(mysql_error());
}
	function getOrders()
	{
		if (!file_exists(ORDERS_LOG))
			return false;
		
		$allorders = array();
		$orders = file(ORDERS_LOG);
		foreach ($orders as $order) {
			list($n,$e,$p,$a,$c,$dt) = explode("|", $order);
			$orderinfo = array();
				$orderinfo["name"] = $n;
				$orderinfo["email"] = $e;
				$orderinfo["phone"] = $p;
				$orderinfo["address"] = $a;
				$orderinfo["dt"] = $dt*1;
				$sql = "SELECT * FROM orders WHERE customer='$c' AND datetime=".$orderinfo["dt"];
				$result = mysql_query($sql) or die(mysql_error());
				$orderinfo["goods"] = db2array($result);
			$allorders[] = $orderinfo;
		}
		return $allorders;
	}
	/*
	ЗАДАНИЕ 7
	- Опишите функцию getOrders() для получения информации о заказах
	- Получите в виде массива $orders данные о пользователях из файла "orders.log"
	- Создайте массив $allorders для хранения информации обо всех заказах
	- В цикле foreach переберите все заказы
	- Внутри цикла foreach создайте ассоциативный массив $orderinfo для хранения информации о каждом конкретном заказе
	- Сохраните информацию о пользователе из массива $orders(name, email, phone, address, customer, date) в массиве $orderinfo
	- Опишите SQL-оператор для выборки из таблицы заказов всех товаров для конкретного покупателя
	- Получите весь результат этой выборки
	- Сохраните полученный в предыдущем пункте результат как значение
		ключа "goods" в массиве $orderinfo
	- Добавьте сформированный массив $orderinfo в виде значения очередного ключа массива $allorders
	- Функция getOrders() должна возвращать массив $allorders с информацией о всех покупателях
		и сделанных ими заказах
	*/

?>