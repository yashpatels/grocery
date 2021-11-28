<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$star=$_SESSION["star"];
$querys="SELECT * FROM orders WHERE username='$username' and cart='no'";
// echo $querys;

$results=mysqli_query($conn,$querys);
// echo mysqli_num_rows($results);
$prev=0;
while($row=mysqli_fetch_array($results))
{
	$order_no=$row["order_no"];
	$del=$row["delieverd"];
	$add=$row["address"];
	$query="SELECT * FROM orders WHERE username='$username' and order_no='$order_no'";
	$result=mysqli_query($conn,$query);
	$total_bill=0;
	
	if($prev!=$order_no)
	{
		$prev=$order_no;
		// echo $prev;
		echo "<table><tr><td>Product ID</td><td>Product Name</td><td>Price</td><td>Quantity</td><td>Total Price</td></tr>";
		while($fetch_row=mysqli_fetch_array($result))
		{

			$id=$fetch_row["product_id"];
			$quantity=$fetch_row["quantity"];
			echo "<tr><td>";
			echo $id;
			echo "</td>";
			$product_details="SELECT * FROM products WHERE id='$id'";
			$product_result=mysqli_query($conn,$product_details);
			while($product_row=mysqli_fetch_array($product_result))
			{
				$name=$product_row["product"];
				if($star=='yes'){
					$price=$product_row["price_Star"];
				}
				else{
					$price=$product_row["price"];
				}
				$total=$price * $quantity;
				echo "<td>".$name."</td><td>".$price."</td><td>".$quantity."</td><td>".$total."</td><tr>";
				$total_bill = $total + $total_bill;
			}
		}
		echo "</table>Total : " .$total_bill;
		if($del=='yes'){
			echo "<br><br>This Order Delievered to ".$add." Successfully.";
		}
		echo "<hr>";
	}
}	
?>