<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="menu">
		<a href="index.php">Main</a> | 
		<a href="index.php?c=page&act=catalog">Catalog</a> | 
		<?php
			if ($user['name']) {
				echo '<a href="index.php?c=user&act=info"Profile</a> | <a href="index.php?c=page&act=basket">Моя корзина</a> | <a href="index.php?c=user&act=logout">Exit ('. $user['name'] .')</a>';
				if ($user['role']) {
					echo ' | <a href="index.php?c=admin&act=orders">Manage orders</a>';
				}
			} else {
				echo '<a href="index.php?c=user&act=login">Sign in</a> | <a href="index.php?c=user&act=reg">Sign up</a>';
			}
		?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Footer stuff
	</div>
</body>
</html>