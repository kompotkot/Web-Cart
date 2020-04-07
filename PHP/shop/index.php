<?php

function __autoload($classname){
	include_once("c/$classname.php");
}

//site.ru/index.php?act=auth&c=user

$action = 'action_';	// All methods starts with action_
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';	// What we do? For ex. - auth

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = false;
}

if (isset($_GET['c'])) {
	// Depence of which action and param c we get controller object
	if ($_GET['c'] == 'page') {
		$controller = new C_Page();
	} else if ($_GET['c'] == 'user') {
		$controller = new C_User();
	} else if ($_GET['c'] == 'admin') {
		$controller = new C_Admin();
	}
} else {
	$controller = new C_Page();
}

$controller->Request($action, $id);