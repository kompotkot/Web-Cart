<?php

abstract class baseGood {
	public $title = "Good";

	public function getTitle() {
		echo $this->title;
	}

	abstract protected function getPrice();
	
	public function render() {
		$this->getTitle();
		$this->getPrice();
	}
}

class techGood extends baseGood {
	private const price = 100;

	protected function getPrice() {
		echo self::price;
	}
}

class physicalGood extends baseGood {
	protected function getPrice() {
		$price = techGood::getPrice();		// Не меняется на int
		$res = (int) $price;
		echo $res;
	}
}

class powderyGood extends baseGood {
	private const price = 100;

	protected function getPrice() {
		echo self::price;
	}
}

$tGood = new techGood;
$tGood->render();

$pGood = new physicalGood;
$pGood->render();

