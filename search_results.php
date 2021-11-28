<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$category=$_GET["q"];
$query="SELECT * FROM products WHERE product='$category' OR category='$category'";
$result=mysqli_query($conn,$query);
$i=0; 
            while($row=mysqli_fetch_array($result)){
              if($i%2==0){
                echo "<div style='display:flex;'>";
              }
              
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
                echo "<img style='border-radius: 8px; width: 300px;' src='data:image/png;base64,".base64_encode($tmp)."' alt='Profile Picture' >";
                ?>
              <h1><?php echo $product ?></h1>
              <p class="title"><?php echo $category ?></p>
              <p>Actual Price : Rs. <?php echo $price ?></p>
              <p>Star Member Price : Rs. <?php echo $price_star ?></p>
              <div style="margin: 24px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
              <p><button onclick="view_product_desc('<?php echo $id; ?>')">View</button></p>
            </div>
            <?php
            if($i%2!=0){
                echo "</div>";
              }
            $i++;
        	}
          if($i%2==0){
            echo "</div>";
          }
            ?>
          }
