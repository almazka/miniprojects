<?php
function ClearData ($value,$type='s')
{
	switch ($type) {
		case 's':
			$value = mysql_real_escape_string(trim(strip_tags($value)));
			break;
		case 'i':
			 $value = abs((int)$value);
			 break;
	}
	return $value;
}
function save($author,$title,$pubyear,$price)
{
	$sql = "INSERT INTO catalog (author, title, pubyear, price) VALUES ('$author', '$title', $pubyear, $price)";
	mysql_query($sql) or die(mysql_error());
}
function db2array($data)
{
	$arr = array();
	while ($row = mysql_fetch_assoc($data)) {
	 	$arr[] = $row;
	 }
	return $arr;  
}
function SelectAll()
{
	$sql = "SELECT * FROM catalog";
	$all = mysql_query($sql) or die(mysql_error());
	return db2array($all);
}
	function add2basket($customer, $goodsid, $quantity, $datetime)
	{
		$sql = "INSERT INTO basket (customer, goodsid, quantity, datetime) VALUES ('$customer', $goodsid, $quantity, $datetime)";
	mysql_query($sql) or die(mysql_error());
	}
function myBasket()
{
	$sql = "SELECT author,title,pubyear,price, basket.id,goodsid,quantity,customer
FROM catalog, basket WHERE customer='".session_id()."' AND catalog.id=basket.goodsid";
$bask_res = mysql_query($sql) or die(mysql_error());
return db2array($bask_res);
}
function basketDel($del_id){
	  $sql = "DELETE FROM basket WHERE id=$del_id";
	  mysql_query($sql) or die(mysql_error());
}
function resave($datetime)
	{
		$all_basket = myBasket();
		foreach ($all_basket as $value) {
			$sql = "INSERT INTO orders (author, title, pubyear, price, customer, quantity, datetime) VALUES ('{$value["$author"]}', {$value["$title"]}, {$value[$pubyear]}, {$value[$price]}, {$value["$customer"]}, {$value[$quantity]}, $datetime)";
	mysql_query($sql) or die(mysql_error()); 
		}
		$sql = "DELETE FROM basket WHERE customer='orders.customer'";
		mysql_query($sql) or die(mysql_error()); 
	}	
	function getOrders()
	{
		if (file_exists(ORDERS_LOG)) {
			$allorders = array();
			$orders = file(ORDERS_LOG);
			foreach ($orders as $value) {
				list($name,$email,$phone,$address,$customer,$datetime) = explode("|", $value);
				$orderinfo = array();
				$orderinfo["name"] = $name;
				$orderinfo["email"] = $email;
				$orderinfo["phone"] = $phone;
				$orderinfo["address"] = $address;
				$orderinfo["datetime"] = $datetime*1;
				$sql = "SELECT * FROM orders WHERE customer='$customer' AND datetime=".$orderinfo["datetime"];
				$result = mysql_query($sql) or die(mysql_error());
				$orderinfo["goods"] = db2array($result);
				$allorders[] = $orderinfo;
			}
		}
		return $allorders; 
	}
?>