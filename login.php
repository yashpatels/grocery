<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$_SESSION["username"]=$_POST["username"];
$username=$_POST["username"];
$password=$_POST["password"];
if($username=="admin" && $password=="adm123")
{
	$_SESSION["username"]="admin";
	echo "<script>window.open('adminhome.php','_self')</script>";
}
$query="select * from users where username='$username' and password='$password'";
$run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)==1)
{
	echo "<script>window.open('homeex.php','_self')</script>";
}
else
{
	echo"<script>alert('Incorrect Username or Password');</script>";
}

?>