	<thead>
		<tr>
			<th>Item code</th>
			<th>Name</th>
			<th>Buying price</th>
			<th>Selling price</th>
			<th>Size</th>
			<th>Diameter</th>
			<th>Brand</th>
			<th>Material</th>
			<th>Description</th>
			<th>Country of origin</th>
			<th>Stock</th>
			<th>Ministry code</th>
			<th>Action</th>
			<th>Action</th>

			<!-- <th colspan="2">Action</th> -->
		</tr>
	</thead>
	<?php
	session_start();
	require_once("connection.php");
	$q="SELECT * FROM item";
	$result=mysqli_query($conn,$q);
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr name=".$row["item_code"].">";
		echo "<td>".$row["item_code"]."</td>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["buying_price"]."</td>";
		echo "<td>".$row["selling_price"]."</td>";
		echo "<td>".$row["size"]."</td>";
		echo "<td>".$row["diameter"]."</td>";
		echo "<td>".$row["brand"]."</td>";
		echo "<td>".$row["material"]."</td>";
		echo "<td>".$row["description"]."</td>";
		echo "<td>".$row["country_of_origin"]."</td>";
		echo "<td>".$row["stock"]."</td>";
		echo "<td>".$row["ministry_code"]."</td>";
		echo "<td><button onclick='get_edit_row_items(".$row["item_code"].")'  class='editbutton'>Edit</button></td>";
		echo "<td><button onclick='delete_items(".$row["item_code"].")' class='deletebutton'>Delete</button></td>";
		echo "</tr>";
	}
	?>
	<tfoot>
		<tr>
		<tr>
			<th>Item code</th>
			<th>Name</th>
			<th>Buying price</th>
			<th>Selling price</th>
			<th>Size</th>
			<th>Diameter</th>
			<th>Brand</th>
			<th>Material</th>
			<th>Description</th>
			<th>Country of origin</th>
			<th>Stock</th>
			<th>Ministry code</th>
			<th>Action</th>
			<th>Action</th>

			<!-- <th colspan="2">Action</th> -->
		</tr>
		</tr>
	</tfoot>
