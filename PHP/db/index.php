<?php
header("Content-Type: text/html; charset=UTF-8");

define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','test_shop_1');
define('DB_USER','root');
define('DB_PASS','1234');

echo "Hello!";

try {
	# Connect to DB
	$connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str, DB_USER,DB_PASS);
	$db->query( "SET CHARSET utf8" );		# Rus symbols
	
	$result = $db->query("SELECT * FROM goods LIMIT 1");

	# Error handler
	$error_array = $db->errorInfo();
	if($db->errorCode() != 0000){
		echo "SQL error: " . $error_array[2] . '<br /><br />';
	}

	# Return data
	while($row = $result->fetch()) {
		print_r($row);
	}

} catch(PDOException $e) {
	die('Error: '.$e->getMessage());
}
