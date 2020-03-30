<!DOCTYPE html>
<html  lang="en">
<head>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Test</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<form action="/send.php" method="post">
		<p>How many rows to shows</p>
		<input type='number' min='1' max='5' name='value'>
		<input type='submit' name='send'>
	</form>

	<div class="response"></div>

</body>
</html>
