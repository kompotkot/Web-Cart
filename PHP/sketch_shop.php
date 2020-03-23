<?php

echo "Shop";

class ProductList {	
	public $allProducts;
}

class ProductItem {	
	private $id;
	private $name;
	private $price;

	function __construct($id,$name,$price) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}
}

class Cart extends ProductList {
	private $cartList;

	function addProduct() {
		echo 123;
	}

	function removeProduct() {
		echo 123;
	}

	public static function render() {
		echo "<p>Cart</p>";
	}
}

class CartItem extends ProductItem {
	private $quantity;

	function __construct($id,$name,$price,$quantity) {
		parent::__construct($id,$name,$price);
		$this->quantity = $quantity;
	}

	public static function render(){
		echo "<p>Cart Item</p>";
	}
}
