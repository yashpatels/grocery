<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$id=$_POST["ids"];
$delete_query="DELETE FROM products WHERE id='$id'";
if(mysqli_query($conn,$delete_query)){
	echo "<script>alert('Product Deleted.');window.open('adminhome.php','_self')</script>";
}
?>