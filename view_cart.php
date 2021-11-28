<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$star=$_SESSION["star"];
$query="SELECT * FROM orders WHERE username='$username' AND cart='yes'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)!=0){
?>
<table>
	<tr><td>Product ID</td><td>Product Name</td><td>Price</td><td>Quantity</td><td>Total Price</td></tr>

<?php
$total_bill=0;
while($row=mysqli_fetch_array($result)){
	$main_id=$row["id"];
	$id=$row["product_id"];
	$quantity=$row["quantity"];
	echo "<tr><td>";
	echo $id;
	echo "</td>";
	$product_details="SELECT * FROM products WHERE id='$id'";
	$product_result=mysqli_query($conn,$product_details);
	while($product_row=mysqli_fetch_array($product_result)){
			$name=$product_row["product"];
			if($star=='yes'){
				$price=$product_row["price_Star"];
			}
			else{
				$price=$product_row["price"];
			}
			$total=$price * $quantity;
			echo "<td>".$name."</td><td>".$price."</td><td><button style='width:fit-content; border-radius:25px;background-color:#9d012e;' onclick=dec_quantity('".$id."','".$main_id."')>-</button> ".$quantity." <button onclick=inc_quantity('".$id."','".$main_id."') style='width:fit-content; border-radius:25px;background-color:#9d012e;'>+</button></td><td>".$total."</td><tr>";
			$total_bill = $total + $total_bill;

	}

}
echo "</table>Total : " .$total_bill."<br>";

$query1="SELECT * FROM address where username='$username'";
$result1=mysqli_query($conn,$query1);
$i=1;
echo "<form method='POST' action='place_order.php'>";
while($row=mysqli_fetch_array($result1)){
	echo "Address ".$i." : ";
	echo "<input type='radio' name='address_select' value='".$row['address']."' required>";
	echo $row["address"];
	echo "<br>";
	$i++;
}
?>
<input type="submit" value="Place Order">
</form>
<?php
}
else
{
	echo "Your Cart is Empty ! ";
}
?>