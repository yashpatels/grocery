<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$id=$_GET["q"];
$main_id=$_GET["r"];
$fetch="SELECT * FROM orders WHERE username='$username' AND id='$main_id' AND product_id='$id' AND cart='yes'";
$result=mysqli_query($conn,$fetch);
while($row=mysqli_fetch_array($result)){
	$quantity=$row['quantity'];
	$quantity=$quantity + 1;
	$query="UPDATE orders SET quantity='$quantity' WHERE username='$username' AND product_id='$id' AND cart='yes' AND id='$main_id'";
	mysqli_query($conn,$query);
}
?>