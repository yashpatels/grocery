<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$id=$_GET["q"];
$query="SELECT * FROM products WHERE id='$id'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
		$id=$row["id"];
		$product=$row["product"];
	    $category=$row["category"];
	    $image=$row["image"];
	    $price=$row["price"];
	    $price_star=$row["price_Star"];
	    $tmp=$row["tmp"];
	    $desc=$row["description"];

	    echo "<img style='border-radius: 8px; width: 400px;' src='data:image/png;base64,".base64_encode($tmp)."' alt='Profile Picture' >";

	    ?>

	    <h1><?php echo $product ?></h1>
        <p class="title"><?php echo $category ?></p>
        <p>Actual Price : Rs. <?php echo $price ?></p>
        <p>Star Member Price : Rs. <?php echo $price_star ?></p>
		<p>Description : <?php echo $desc ?></p>
        <p><button style="width: fit-content;border-radius: 8px;" onclick="addtocart('<?php echo $id; ?>')">AddToCart</button></p>

	    <?php

	}
?>