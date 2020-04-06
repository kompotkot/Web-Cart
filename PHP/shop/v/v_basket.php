<table border="1px">
	<tr>
		<th>Name</th>
		<th>Quantity</th>
		<th>Per one ($)</th>
		<th>Total ($)</th>
		<th>Delete</th>
	</tr>
	<?php
		$order = 0;
		if (isset($products)) {
			foreach ($products as $product) {
				echo "<tr><td>" . $product["title"] . "</td><td>" . $product["count"] . "</td><td>" . $product["price"] . "</td><td>" . $product["count"] * $product["price"] . "</td><td><form method='post' name='delete_form'><input type='hidden' name='order' value='" . $product["order_id"] . "'><input type='submit' name='submit' value='Delete'></form></td></tr>";
				$order += $product["count"] * $product["price"];
			}
		}
	?>
</table>
<h2><?= "Total price: " . $order . " USD"?></h2>