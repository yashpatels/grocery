<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$id=$_GET["q"];
$query="UPDATE orders SET delieverd='yes' WHERE order_no='$id'";
if(mysqli_query($conn,$query)){
	echo "<script>alert('Order Completed');window.location.href='adminhome.php';</script>";
}

?>