<?php

class Test extends Dbo {
	
	public function getData() {
		$command = "SELECT * FROM goods LIMIT 5";
		$result = $this->connect()->query($command);

		while($row = $result->fetch()) {
			print_r($row);
		}
	}
}