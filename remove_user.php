<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$username=$_GET["q"];
$query="DELETE FROM users WHERE username='$username'";
$query1="DELETE FROM orders WHERE username='$username'";
mysqli_query($conn,$query);
mysqli_query($conn,$query1);
?>