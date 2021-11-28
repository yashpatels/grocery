<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$order_no=rand(1000,9999);
$add=$_POST["address_select"];
$query="UPDATE orders SET cart='no',order_no='$order_no',address='$add' WHERE username='$username' AND order_no='0'";
if(mysqli_query($conn,$query)){
	echo "<script>alert('OrderPlaced');window.location.href='homeex.php';</script>";
}

?>