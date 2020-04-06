<script>
	window.onload = function() {
		document.getElementById('buy').onclick = function() {
			document.getElementById('buy').style.display = "none";
			document.getElementById('buying_form').style.display = "block";
		};
	}
</script>
<div class="product">
	<h1><span><?= $product["title"] ?></span></h1>
	<img src="/<?= $product["image"] ?>" alt="Placeholder" title="<?= $product["title"] ?>" target="_blank">
	<span class="content"><?= $product["content"] ?></span>
	<h3><?= $product["price"] ?> $</h3>
	<?php
		if ($user_id) {
			echo "
			<div id='buying_form'>
				<span>Quantity</span>
				<form method='post' name='buying_form'>
					<input type='number' name='count' required>
					<input type='submit' name='button' value='Add'>
				</form>
			</div>";
		}
	?>
</div>
<?php if(isset($text)){echo "<script>alert('$text')</script>";}?>