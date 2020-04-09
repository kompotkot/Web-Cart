<?php

require_once 'MathClass.php';

use PHPUnit\Framework\TestCase;

class MathClassTest extends TestCase {

	/**
	* @dataProvider additionProvider
	*/

	public function testFactorial($value, $expected){
		$obj = new MathClass();
		$this->assertSame($expected, $obj->factorial($value));
	}

	public function additionProvider(){
		return [
			[6,720],
			[5,120]
		];
	}
}