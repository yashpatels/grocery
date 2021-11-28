<!--info_of_user-->

<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"crud");
session_start();
$username=$_SESSION["username"];
$query="SELECT * FROM users WHERE username='$username'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
	$name=$row["name"];
	$username=$row["username"];
	$email=$row["email"];
	$gender=$row["gender"];
}
echo $name;
echo $email;
?>

<!--Adding_image-->

<!DOCTYPE html>
<html>
<body>
<form name="add_pic" action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr><td>Choose Pic : </td><td><input type="file" name="photos"></td></tr>
		<tr><td>Tags : </td><td><textarea name="tags">Type Here..</textarea></td></tr>
	</table>
	<input type="submit" name="add_pic_sub">
</form>
</body>
</html>
<?php
if(isset($_POST['add_pic_sub']))
{
	$picname=$_FILES["photos"]["name"];
	$tags=$_POST["tags"];
	$add_pic="INSERT INTO pictures(username,image,tags)  values('$username','$picname','$tags')";
	if(mysqli_query($conn,$add_pic)){
		echo "<script>alert('Picture Added Succesfully ');</script>";
	}
}
?>



<!--Explore-->
<?php
$explore_query="SELECT * FROM pictures";
$explore_result=mysqli_query($conn,$explore_query);
while($explore_row=mysqli_fetch_array($explore_result)){
	$explore_username=$explore_row["username"];
	$explore_pic=$explore_row["image"];
	$explore_tags=$explore_row["tags"];
	echo $explore_pic;
	echo "yashhh";
}
?>

<!--Own_image_setting-->
<?php
$display_own="SELECT * FROM pictures WHERE username='$username'";
$display_own_result=mysqli_query($conn,$display_own);
while($own_row=mysqli_fetch_array($display_own_result)){
	$own_pick=$own_row["image"];
	$own_tags=$own_row["tags"];
	$own_id=$own_row["id"];
	?>
	<img src="<?php echo $own_pick ?>" style="width: 300px;height: 400px;" >
	<form method="POST" action="">
		<input type="hidden" name="id" value="<?php echo $own_id ?>">
		<input type="submit" name="delete" value="delete">
	</form>
	<?php
	echo $own_pick;
	echo $own_tags;
}

if(isset($_POST['delete'])){
	$delete_id=$_POST["id"];
	$delete_query="DELETE FROM pictures WHERE id='$delete_id'";
	if(mysqli_query($conn,$delete_query))
	{
		echo "<script>alert('Photo Deleted !');</script>";
	}
}

?>