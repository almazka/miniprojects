<?php
/**
*  Идея в том, чтобы в отдельном классе просчитывалась цена со скидкой. В этот отдельный класс передается класс самого продукта
*/
class Product
{
	private $price;
	private $discount;
	
	function __construct($price, $discount)
	{
		$this->price = $price;
		$this->discount = $discount;
	}
	function GetPrice()
	{
		return $this->price;
	}
	function GetDiscount()
	{
		return $this->discount;
	}
}
class ProductAdapter
{
	private $_product;
	
	function __construct(Product $objproduct)
	{
		$this->_product = $objproduct;
	}
	function GetPrice()
	{
		if (is_object($this->_product)) {
			return $this->_product->GetPrice() - $this->_product->GetDiscount();
		} else {
			echo "Не объект";
		}
		
	}
}
$product = new Product(100,20);

$productdisc = new ProductAdapter($product);
echo "Цена со скидкой: ".$productdisc->GetPrice()."<br/>";
?>