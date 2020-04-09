<?php

require_once 'm/SQL.php';

use PHPUnit\Framework\TestCase;

class SQLTest extends TestCase {

	/**
	* @dataProvider additionProvider
	*/

	public function testPassword($name, $password, $expected){
		$obj = new SQL();
		$this->assertSame($expected, $obj->Password($name, $password));
	}

	public function additionProvider(){
		return [
			['name','pass','7924ae672d3b5f36b244054cc139860b1a1dc91c907325c69271ddf0c944bc72'],
			['test','123','6f4b726238e4edac373d1264dcb6f890202cb962ac59075b964b07152d234b70']
		];
	}
}