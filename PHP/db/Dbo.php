<?php

class Dbo {
	private $dbdriver = 'mysql';
	private $dbhost = 'localhost';
	private $dbname = 'test_shop_1';
	private $dbuser = 'root';
	private $dbpass = '1234';

	protected function connect() {
		try {
			$con = $this->dbdriver . ':host=' . $this->dbhost . ';dbname=' . $this->dbname;
			$pdo = new PDO($con,$this->dbuser,$this->dbpass);

			$pdo->query( "SET CHARSET utf8" );		# Rus symbols
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $pdo;

		} catch(PDOException $e) {
			die('Error connect failed: '.$e->getMessage());
		}

	}
}
