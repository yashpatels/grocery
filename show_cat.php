<?php

$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"grocery");
$search_username="SELECT DISTINCT category FROM `products`";
$username_run=mysqli_query($conn,$search_username); 
            while($srow=mysqli_fetch_array($username_run))
            {
                $title=$srow['category'];
                ?>
                <x style="cursor: pointer;" onclick="show_cat_product('<?php echo $title; ?>','0')"><?php echo $title; ?></x><br>
                <?php
            }  
?>