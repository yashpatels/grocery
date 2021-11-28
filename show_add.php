<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
session_start();
$username=$_SESSION["username"];
$query="SELECT * FROM address where username='$username'";
$result=mysqli_query($conn,$query);
$i=1;
while($row=mysqli_fetch_array($result)){
	echo "Address ".$i." : ";
	echo $row["address"];
	echo "<br>";
	$i++;
}
?>
<form method="POST" action="add_add.php">
	<table style="margin-left: 400px">
		Address : <textarea style="background:transparent; border-bottom: 5px solid #9d012e;" rows="3" cols="30" name="addresses"></textarea>
	</table>
	<input type="submit" name="submit">
</form>