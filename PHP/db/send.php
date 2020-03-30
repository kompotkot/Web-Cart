<?php 
include 'Dbo.php';
include 'Dbo_fetch.php';

session_start();		# Save value in PHPSESSID

if ($_POST[value]) {
	$_SESSION[value] += $_POST[value];
}

#echo $_SESSION[value] ?: $defaultValue;	# Check proper value

$obj = new ExtractData();
$obj->getData($_SESSION[value],$_POST[value]);
