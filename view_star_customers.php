<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$query="SELECT * FROM users";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
	$name=$row["name"];
    $username=$row["username"];
    $email=$row["email"];
    $gender=$row["gender"];
    $pic=$row["profilepic"];
    $tmp=$row["tmp"];
    $star=$row["star"];
    if($username != "admin" && $star=='yes'){?>
     <div class="card">
                <?php
                echo "<img style='border-radius: 8px; width: 100%;' src='data:image/png;base64,".base64_encode($tmp)."' alt='Profile Picture' >";
                ?>
              <h1><?php echo $name ?></h1>
              <p class="title"><?php echo $username ?></p>
              <p><?php echo $email ?></p>
              <p><?php echo $gender ?></p>
              <div style="margin: 24px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
              <p><button onclick="remove_user('<?php echo $username ?>')">remove</button></p>
            </div>

<?php
} }    
?>