<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$addresss=$_POST["addresses"];
	$query="INSERT INTO address values('$username','$addresss')";
	if(mysqli_query($conn,$query)){
		echo "<script>window.location='homeex.php'</script>";
	}
?>