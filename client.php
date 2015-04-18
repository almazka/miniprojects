<?php
$client = new SoapClient('http://localhost/stock.wsdl');
try {
	$res = $client->getStock("2");
echo "$res";
} catch (SoapFault $e) {
    echo $e->getMessage();
}
?>