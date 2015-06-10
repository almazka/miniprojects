<?php
class StockService {
function getStock($num)
{
	$stock = array(
			"1"=>100,
			"2"=>200,
			"3"=>300,
			"4"=>400,
			"5"=>500,
		);
	if (array_key_exists($num, $stock)) {
		return $stock[$num];
	} else {
		throw new SoapFault("Server", "Несуществующий id товара");
	}
}}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://localhost/stock.wsdl");
$server->setClass("StockService");
$server->handle();
?>