<?php

$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$category=$_GET["q"];
$search_username="SELECT * FROM `products` WHERE category='$category'";
$username_run=mysqli_query($conn,$search_username); 
            while($srow=mysqli_fetch_array($username_run)){

         			$id=$row["id"];
            		$product=$row["product"];
		            $category=$row["category"];
		            $image=$row["image"];
		                $price=$row["price"];
		                $price_star=$row["price_Star"];
		                $tmp=$row["tmp"];
		                ?>

            		<div class="card">
                <?php
                echo "<img style='border-radius: 8px; width: 100%;' src='data:image/png;base64,".base64_encode($tmp)."' alt='Profile Picture' >";
                ?>
                <form method="POST" action="update_product.php">
              <h1><input type="text" name="product" value="<?php echo $product ?>"></h1>
              <p class="title"><input type="text" name="category" value="<?php echo $category ?>"></p>
              <p>Actual Price<input type="text" name="price" value="<?php echo $price ?>"></p>
              <p>Star Member Price<input type="text" name="star_price" value="<?php echo $price_star ?>"></p>
              <input type="hidden" name="ids" value="<?php echo $id ?>">
              <div style="margin: 24px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
              <p><button type="submit" name="update">Update</button></p></form><p><form action="delete_product.php" method="POST"><input type="hidden" name="ids" value="<?php echo $id ?>"><button type="submit" name="delete">Delete</button></form></p>
            </div>
            <?php
        	}
            ?>
