<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$id=$_GET["q"];
session_start();
$username=$_SESSION["username"];
$star=$_SESSION["star"];
$query="INSERT INTO orders(username,product_id,quantity,cart,delieverd,order_no,star) VALUES('$username','$id',1,'yes','no','0','$star')";
if(mysqli_query($conn,$query)){
	echo "ADDED";
	echo "<script>window.location('homeex.php')</script>";
}
?>