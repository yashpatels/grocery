<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$query="UPDATE users SET star='yes' WHERE username='$username'";
if(mysqli_query($conn,$query)){
	echo "<script>alert('Congratulations! You Are A Star Member Now.');window.location='homeex.php';</script>";
}
?>
