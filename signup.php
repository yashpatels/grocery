<?php	
$conn=mysqli_connect("localhost","root","") or die("could not connect");
mysqli_select_db($conn,"grocery")
or mysqli_query($conn,"grocery");


$myfilename = $_FILES["photo"]["name"];
$name=$_POST["name"];
$username=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$conf=$_POST["confpass"];
$gender=$_POST["gender"];
$imagetmp=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$otp=rand(1000,9999);


$checkuser="select * from users where username='$username'";
$checkemail="select * from users where email='$email'";

$runuser=mysqli_query($conn,$checkuser);
$runemail=mysqli_query($conn,$checkemail);

$cntuser=mysqli_num_rows($runuser);
$cntemail=mysqli_num_rows($runemail);

session_start();
$_SESSION['otp']=$otp;
$_SESSION['email']=$email;

if($cntuser>0 && $cntemail>0 )
{
	echo "<script>alert('Username And Email Already Exist.Choose Another');location='home.html';</script>";
}
else if($cntuser>0)
{
	echo "<script>alert('Username Already Exist.Choose Another');location='home.html';</script>";
}
else if($cntemail>0 )
{
	echo "<script>alert('Email Already Exist.Choose Another');location='home.html';</script>";
}
else
{
 	if($pass==$conf)
	{
		$sql="INSERT INTO users (name,username,email,password,profilepic,tmp,gender,varified,otp,star) VALUES ('$name','$username','$email','$pass','$myfilename','$imagetmp','$gender','NO',$otp,'no')";
		if (mysqli_query($conn,$sql))
	 	{
        	echo "<script>alert('OTP has been Sent to Registered Email And Registration succesful!');location='ass2/sent.php';</script>";
    	}
    	else
    	{
    		echo "<script>alert('Nope');</script>";
    	}
    }
    else{
    	echo "<script>alert('Nope');</script>";
    }
}
?>