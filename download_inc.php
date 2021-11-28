<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"crud");
$idss=$_GET["id"];
$fetch="SELECT * FROM pictures WHERE id='$idss'";
$fetch_result=mysqli_query($conn,$fetch);
while($fetch_row=mysqli_fetch_array($fetch_result)){
$down_no=$fetch_row["download"];
$downloads=$down_no+1;
$update_download="UPDATE pictures SET download='$downloads' WHERE id='$idss'";
mysqli_query($conn,$update_download); 
echo "<script>window.location='/ita-ass4/homeex.php'</script>";
}
?>

