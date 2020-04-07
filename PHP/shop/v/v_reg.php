<h3><?php if(isset($text)){echo $text;}?></h3>
<br>
<form method="post">
	<input type="text" name="name" placeholder="Name" required>
	<input type="text" name="login" placeholder="Login" required>
	<input type="password" name="password" placeholder="Password" required>
	<input type="submit" name="button" value="Register">
</form>