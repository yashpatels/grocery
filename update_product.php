<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$id=$_POST["ids"];
$category=$_POST["category"];
$product=$_POST["product"];
$price=$_POST["price"];
$star_price=$_POST["star_price"];
$descr=$_POST["descr"];

$delete_query="UPDATE products SET product='$product',category='$category',price=$price,price_Star=$star_price,description='$descr' WHERE id='$id'";
// echo $delete_query;
if(mysqli_query($conn,$delete_query)){
	echo "<script>alert('Product Updated.');window.open('adminhome.php','_self')</script>";
}
?>