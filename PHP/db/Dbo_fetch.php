<?php

# Extracting data from our databse
class ExtractData extends Dbo {
	
	public function getData($start,$push) {
		$command = "SELECT * FROM goods LIMIT $start,$push";
		$result = $this->connect()->query($command);

		while($row = $result->fetch()) {
			print_r($row);
		}
	}
}