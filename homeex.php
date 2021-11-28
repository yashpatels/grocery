<?php
            $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
            mysqli_select_db($conn,"grocery");
            session_start();
            $username=$_SESSION["username"];
            $search_query="SELECT * FROM `products`";
            $search_username="SELECT DISTINCT category FROM `products`";
            $verify_query="SELECT * FROM `users` WHERE username='$username'";
            $verify_result=mysqli_query($conn,$verify_query);
            while($verify_row=mysqli_fetch_array($verify_result))
            {
              $verify_status=$verify_row["varified"];
              $verify_otp=$verify_row["otp"];
              if($verify_status=="NO")
              {
                ?>
                <style type="text/css">
                                  
                input {
                  border: 1px solid transparent;
                  background-color: #f1f1f1;
                  padding: 10px;
                  font-size: 16px;
                }

                input[type=text] {
                  background-color: #f1f1f1;
                  width: 50%;
                  border-radius: 8px;
                }

                input[type=submit] {
                  background-color: #9d012e;
                  color: #fff;
                  border-radius: 8px;
                  cursor: pointer;
                }
                </style>
                <body style="background-image: linear-gradient(#F17153, #F58D63, #f1ab53);">
                <form style="margin-top: 200px; margin-left: 33%;" action="" method="POST">
                  <input type="text" name="otp" placeholder="Enter OTP Sent to your Email"><br>
                  <br><input style="margin-left: 220px;" type="submit" name="confirm" value="confirm">
                </form>
              </body>
                <?php
                  if(isset($_POST["confirm"]))
                  {
                    if($_POST["otp"]==$verify_otp)
                    {
                      $update_email="UPDATE users SET varified='YES' where username='$username'";
                      if(mysqli_query($conn,$update_email))
                      {
                        echo "<script>alert('Updated Succesfully');window.location.href='homeex.php';</script>";
                      }
                    }
                    else
                    {
                      echo "<script>alert('Wrong OTP');window.location.href='homeex.php';</script>";
                    }
                  }
                }
              else
              {


            $search_result=mysqli_query($conn,$search_query);
            $username_run=mysqli_query($conn,$search_username);

            $array_search='[x,';
            $cnt=1;
            while($row=mysqli_fetch_array($search_result))
            {
                $title=$row['product'];
                $array_search.="$title,";
                $cnt++;
            }   
            while($srow=mysqli_fetch_array($username_run))
            {
                $title=$srow['category'];
                $array_search.="$title,";
                $cnt++;
            }  
            $array_search=$array_search.']';
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


table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #ef7979;}

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
function buy_star(){
  window.location = 'buy_star.php';
}

function search_results(){
  var x =document.getElementById("myInput").value;
  document.getElementById("every_other").style="display:block";
  document.getElementById("profile_div").style="display:none";
  if (window.XMLHttpRequest) {
  xmlhttp=new XMLHttpRequest();
  }
xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
    document.getElementById("every_other").innerHTML=this.responseText;
  }
}
xmlhttp.open("GET","search_results.php?q="+x,true);
xmlhttp.send();
}
function show_orders(){
document.getElementById("every_other").style="display:block";
        document.getElementById("profile_div").style="display:none";
        if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","view_orders.php",true);
      xmlhttp.send();
}


function addtocart(x){
    if (window.XMLHttpRequest) {
    new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    document.getElementById("every_other").innerHTML=this.responseText;    
    }
    }
    xmlhttp.open("GET","addtocart.php?q="+x,true);
    xmlhttp.send();

}

  function view_product_desc(id){
    document.getElementById("profile_div").style="display:none";
    document.getElementById("every_other").style="display:block";
    if (window.XMLHttpRequest) {
    new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    document.getElementById("every_other").innerHTML=this.responseText;

    }
    }
    xmlhttp.open("GET","view_product_desc.php?q="+id,true);
    xmlhttp.send();

  }

function show_cart(){
        // alert("yash");
        document.getElementById("every_other").style="display:block";
        document.getElementById("profile_div").style="display:none";
        if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","view_cart.php",true);
      xmlhttp.send();
}
function inc_quantity(x,y){
   if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
          show_cart();
        }
      }
      xmlhttp.open("GET","inc_quantity.php?q="+x+"&r="+y,true);
      xmlhttp.send();
}
function dec_quantity(x,y){
   if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
          show_cart();
        }
      }
      xmlhttp.open("GET","dec_quantity.php?q="+x+"&r="+y,true);
      xmlhttp.send();
}
function place_order(){
  if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","place_order.php",true);
      xmlhttp.send();
}
    function show_explore(){

        document.getElementById("profile_div").style="display:none";
        document.getElementById("every_other").style="display:block";
      if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","explore_product.php",true);
      xmlhttp.send();
    }
    function show_categories(){
        
        if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("categories_show").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","show_cat.php",true);
      xmlhttp.send();
    }

    function show_address(){
        
    document.getElementById("profile_div").style="display:none";
    document.getElementById("every_other").style="display:block";
        if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("every_other").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","show_add.php",true);
      xmlhttp.send();
    }
    function show_cat_product(x,y){

        document.getElementById("profile_div").style="display:none";
        document.getElementById("every_other").style="display:block";
        if (window.XMLHttpRequest) {
        new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
        document.getElementById("every_other").innerHTML=this.responseText;
        }
        }
        xmlhttp.open("GET","show_cat_product.php?q="+x+"&r="+y,true);
        xmlhttp.send();
    }

    function show_profile(){
        document.getElementById("profile_div").style="display:block";
        document.getElementById("every_other").style="display:none";
    }
</script>
<body style="background-image: linear-gradient(#F17153, #F58D63, #f1ab53);" onload="show_explore()">
    <div class="container-fluid">
        <div style="display: flex;" class="header">
            <div><a href="homeex.php"><h1><font face="Bunch Blossoms Personal Use">urGrocery</font></h1></a></div>
              <div style="margin-left: 700px; margin-top: 20px;">
              <div class="autocomplete" style="width:300px;">
              <input id="myInput" type="text" name="values" placeholder="Type Here">
              </div>
              <button style=" background-color: #9d012e;color: #fff;border-radius: 8px;cursor: pointer;width:fit-content;" onclick="search_results()">search</button>
            </div>
            <a style="margin-left: 100px; margin-top: 25px;" href="logout.php">Log Out</a>
        </div>
        <?php
            $query="SELECT * FROM users WHERE username='$username'";
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_array($result)){
                $name=$row["name"];
                $username=$row["username"];
                $email=$row["email"];
                $gender=$row["gender"];
                $pic=$row["profilepic"];
                $tmp=$row["tmp"];
                $star=$row["star"];
                $_SESSION["star"]=$star;
            ?>
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <div class="logo">
                    <?php
                    echo "<img style='height: 64px; width: 64px;' src='data:image/png;base64,".base64_encode($tmp)."' class='img-responsive center-block' alt='Logo'>";
                ?>
                </div>
                <br>    
                <div class="left-navigation">
                    <ul class="list" style="font-size: 25px;">
                        <h5><strong>WHEREABOUTS</strong></h5>
                        <li onclick="show_explore()">Explore</li>
                        <li onclick="show_categories()">Categories</li>
                        <li id="categories_show"></li>
                        <li onclick="show_profile()">My Profile</li>
                        <li onclick="show_address()">My Address</li>
                        <li onclick="show_cart()">Cart</li>
                        <li onclick="show_orders()">Orders</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content" id="everything">
                 <!--info_of_user-->
            <div id="profile_div" style="display: none;">
            <?php
        }
            ?>
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
              <p><button>Contact</button></p>
            </div>
            <?php
            if($star=='no'){
              ?>
              <h3>*Buy Star Membership*</h3>
              <li>Free Delievery Above Total of Rs.500</li>
              <li>Special Prices On Almost Every Product</li>
              <li>And Fast Delievery</li>
              <button style="width:fit-content; border-radius: 5px; background-color: #08b90b;" onclick="buy_star();">Buy Now</button>
              <?php
            }
            if($star=='yes'){
              ?>
              <h3>*You Are Star Member*</h3>
              <li>Free Delievery Above Total of Rs.500</li>
              <li>Special Prices On Almost Every Product</li>
              <li>And Fast Delievery</li>
              <?php
            }
            ?>
            </div>

            <div id="every_other">
              
            </div>

            </div>
    </div>
</body>
























































<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = "<?php echo $array_search;?>".split(",");

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>


<?php
}}
?>