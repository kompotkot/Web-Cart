<?php

echo "Test<br>";

trait ForSingleton {
	private function __construct() {}

	public static function getInstance() {
		if (empty(self::$instance)) {
			self::$instance = new self();	// new Singleton();
		}
		return self::$instance;
	}
}

class Singleton {
	private static $instance;

	public function doAction() {
		echo "Singleton";
	}

	use ForSingleton;
}

$obj_1 = Singleton::getInstance();
$obj_2 = Singleton::getInstance();

var_dump($obj_1 === $obj_2);			// Check is same objects
