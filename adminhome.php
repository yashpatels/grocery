<?php
            $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
            mysqli_select_db($conn,"grocery");
            session_start();
            if(isset($_SESSION["username"])){

            }
            else{
              header('location:home.html');
            }
 
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
    .sidebar1 {
    background: #F17153;
    /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Firefox 3.6 to 15 */
    background: linear-gradient(#F17153, #F58D63, #f1ab53);
    /* Standard syntax */
    padding: 0px;
    min-height: 100%;
}


table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #ef7979;}

.logo {
    max-height: 130px;
}
.logo>img {
    margin-top: 30px;
    padding: 3px;
    border: 3px solid white;
    border-radius: 100%;
}
.list {
    color: #fff;
    list-style: none;
    padding-left: 0px;
}
.list::first-line {
    color: rgba(255, 255, 255, 0.5);
}
.list> li, h5 {
    padding: 5px 0px 5px 40px;
}
.list>li:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-left: 5px solid white;
    color: white;
    font-weight: bolder;
    padding-left: 35px;
}.main-content{
text-align:center;
}
</style>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>

<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
  border-radius: 8px;
}

input[type=submit] {
  background-color: #9d012e;
  color: #fff;
  border-radius: 8px;
  cursor: pointer;
}

input[type=file] {
  background-color: #9d012e;
  color: #fff;
  border-radius: 8px;
  cursor: pointer;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<script type="text/javascript">
function remove_user(x){
if (window.XMLHttpRequest) {
    new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    document.getElementById("customers").innerHTML=this.responseText;

    }
    }
    xmlhttp.open("GET","remove_user.php?q="+x,true);
    xmlhttp.send();
}



    function my_products(){
        document.getElementById("products").style="display:block";
        document.getElementById("customers").style="display:none";
        document.getElementById("upload_new").style="display:none";
        document.getElementById("star_member").style="display:none"; 
		document.getElementById("orders").style="display:none";
    }
    function show_customers(){
        document.getElementById("products").style="display:none";
        document.getElementById("customers").style="display:block";
        document.getElementById("upload_new").style="display:none";
        document.getElementById("star_member").style="display:none"; 
		document.getElementById("orders").style="display:none";

    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("customers").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","view_customers.php",true);
      xmlhttp.send();

    }

    function show_star_customers(){
        document.getElementById("products").style="display:none";
        document.getElementById("customers").style="display:block";
        document.getElementById("upload_new").style="display:none";
        document.getElementById("star_member").style="display:none"; 
    document.getElementById("orders").style="display:none";

    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("customers").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","view_star_customers.php",true);
      xmlhttp.send();

    }

    function delievered(x){
      // alert("yash");
      window.location = 'delievered.php?q=' + x;

    }
    function add_product(){
        document.getElementById("products").style="display:none";
        document.getElementById("customers").style="display:none";
        document.getElementById("upload_new").style="display:block";
        document.getElementById("star_member").style="display:none"; 
		document.getElementById("orders").style="display:none";
    }
    function show_star(){
        document.getElementById("products").style="display:none";
        document.getElementById("customers").style="display:none";
        document.getElementById("upload_new").style="display:none";
        document.getElementById("star_member").style="display:block"; 
		document.getElementById("orders").style="display:none";
    }
    function show_orders(){
        document.getElementById("products").style="display:none";
        document.getElementById("customers").style="display:none";
        document.getElementById("upload_new").style="display:none";
        document.getElementById("star_member").style="display:none"; 
		document.getElementById("orders").style="display:block";

    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("orders").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","view_orders_admin.php?q='pen'",true);
      xmlhttp.send();
            }

    function show_all_orders(){
        document.getElementById("products").style="display:none";
        document.getElementById("customers").style="display:none";
        document.getElementById("upload_new").style="display:none";
        document.getElementById("star_member").style="display:none"; 
    document.getElementById("orders").style="display:block";

    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("orders").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","view_orders_admin.php?q='all'",true);
      xmlhttp.send();
            }
</script>
<body style="background-image: linear-gradient(#F17153, #F58D63, #f1ab53);">
    <div class="container-fluid">
        <div style="display: flex;" class="header">
            <div><a href="adminhome.php"><h1><font face="Bunch Blossoms Personal Use">urGrocery</font></h1></a></div>
            <a style="margin-left: 100px; margin-top: 25px;" href="logout.php">Log Out</a>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <br>    
                <div class="left-navigation">
                    <ul class="list" style="font-size: 25px;">
                        <h5><strong>WHEREABOUTS</strong></h5>
                        <li onclick="my_products()">My Products</li>
                        <li onclick="show_customers()">Customers</li>
                        <li onclick="add_product()">Upload New</li>
                        <li onclick="show_star_customers()">Star Members</li>
                        <li onclick="show_orders()">Orders Got</li>
                        <li onclick="show_all_orders()">All Orders</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content">
            	

            	<div id="products">products

            		<?php
            		$fetch_product="SELECT * FROM products";
            		$product_query=mysqli_query($conn,$fetch_product);
                $i=0;
            		while($row=mysqli_fetch_array($product_query)){
            			$id=$row["id"];
            			$product=$row["product"];
		                $category=$row["category"];
		                $image=$row["image"];
		                $price=$row["price"];
		                $price_star=$row["price_Star"];
		                $tmp=$row["tmp"];
                    $description=$row["description"];
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
              <p><textarea style="border-radius: 8px;" rows="3" cols="35" name="descr" placeholder="Description"><?php echo $description ?></textarea></p>
              <input type="hidden" name="ids" value="<?php echo $id ?>">
              <div style="margin: 24px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
              <p><button type="submit" name="update">Update</button></p></form><p><form action="delete_product.php" method="POST"><input type="hidden" name="ids" value="<?php echo $id ?>"><button type="submit" name="delete">Delete</button></form></p>
            </div>
            <hr>
            <?php
        	}
            ?>

            	</div>
            	

            	<div style="display: none;" id="customers">customers</div>
            	
            	<div style="display: none" id="upload_new">
            	
            	<form name="add_product1" action="" method="POST" enctype="multipart/form-data">
                <table align="center" style="margin-top: 50px;">
                	<tr><td>Name : </td><td><input style="background: transparent;border-bottom: 5px solid #9d012e;" type="text" name="product_name"></td></tr>
                	<tr><td>Category : </td><td><input style="background: transparent;border-bottom: 5px solid #9d012e;" type="text" name="category"></td></tr>
                    <tr><td>Choose Pic : </td><td><input style="background: transparent;" type="file" name="photos"></td></tr>
                    <tr><td>Price : </td><td><input style="background: transparent;border-bottom: 5px solid #9d012e;" type="text" name="price_product"></td></tr>
                    <tr><td>Price For Star Members : </td><td><input style="background: transparent;border-bottom: 5px solid #9d012e;" type="text" name="price_star"></td></tr>
                    <tr><td>Description : </td><td><textarea style="border-radius: 8px;" rows="3" cols="35" name="descr" placeholder="Description"></textarea></td></tr>
                </table>
                <br><br>
                <input type="submit" name="add_product">
            </form>
            <?php
            
            if(isset($_POST['add_product']))
            {
                $picname=$_FILES["photos"]["name"];
                $p_name=$_POST["product_name"];
                $c_name=$_POST["category"];
                $price_name=$_POST["price_product"];
                $price_star_name=$_POST["price_star"];
                $descriptions=$_POST["descr"];
                $imagetmp=addslashes(file_get_contents($_FILES['photos']['tmp_name']));
                $add_pic="INSERT INTO products(product,category,image,tmp,price,price_Star,description)  values('$p_name','$c_name','$picname','$imagetmp',$price_name,$price_star_name,'$descriptions')";
           		// echo $add_pic;
                if(mysqli_query($conn,$add_pic))
                {
                    echo "<script>alert('Product Added Succesfully ');window.open('adminhome.php','_self');</script>";
                }
            }
            ?>
            	</div>
            	

            	<div style="display: none;" id="star_member">stars</div>
            	

            	<div style="display: none;" id="orders">orders</div>
             

             </div>