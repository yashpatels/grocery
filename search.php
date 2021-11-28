<?php
            $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
            mysqli_select_db($conn,"crud");
            session_start();
            $username=$_SESSION["username"];
            $search_query="SELECT * FROM `pictures`";
            $search_username="SELECT DISTINCT username FROM `pictures`";
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
                $title=$row['tags'];
                $array_search.="$title,";
                $cnt++;
            }   
            while($srow=mysqli_fetch_array($username_run))
            {
                $title=$srow['username'];
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
    function show_explore(){
        document.getElementById("adding_image").style="display:none";
        document.getElementById("uploads_div").style="display:none";
        document.getElementById("profile_div").style="display:none";
        document.getElementById("explore_div").style="display:block"; 
        document.getElementById("analytics").style="display:none";
    }
    function show_my_upload(){
        document.getElementById("adding_image").style="display:none";
        document.getElementById("uploads_div").style="display:block";
        document.getElementById("profile_div").style="display:none";
        document.getElementById("explore_div").style="display:none";
        document.getElementById("analytics").style="display:none";
        document.getElementById("search_result_photo").style="display:none";
    }
    function show_uploading(){
        document.getElementById("adding_image").style="display:block";
        document.getElementById("uploads_div").style="display:none";
        document.getElementById("profile_div").style="display:none";
        document.getElementById("explore_div").style="display:none";
        document.getElementById("analytics").style="display:none"; 
        document.getElementById("search_result_photo").style="display:none";
    }
    function show_profile(){
        document.getElementById("adding_image").style="display:none";
        document.getElementById("uploads_div").style="display:none";
        document.getElementById("profile_div").style="display:block";
        document.getElementById("explore_div").style="display:none";
        document.getElementById("analytics").style="display:none"; 
        document.getElementById("search_result_photo").style="display:none";
    }
    function show_analytics(){
        document.getElementById("adding_image").style="display:none";
        document.getElementById("uploads_div").style="display:none";
        document.getElementById("profile_div").style="display:none";
        document.getElementById("analytics").style="display:block"; 
        document.getElementById("search_result_photo").style="display:none";
        document.getElementById("explore_div").style="display:none";
            }
    function inc_down(name){
      window.location = '/ita-ass4/download_inc.php?id=' + name;
    }
    function show_page(a,b){
      var i=1;
      while(i!=b+1){
        if(i==a){
          document.getElementById(a).style="display:block";
        }
        else{
          document.getElementById(i).style="display:none";
        }
        i++;
      }
    }
</script>
<body style="background-image: linear-gradient(#F17153, #F58D63, #f1ab53);">
    <div class="container-fluid">
        <div style="display: flex;" class="header">
            <div><a href="homeex.php"><h1><font face="Bunch Blossoms Personal Use">Instagram</font></h1></a></div>
              <div style="margin-left: 700px; margin-top: 20px;"><form autocomplete="off" action="search.php" method="POST">
              <div class="autocomplete" style="width:300px;">
              <input id="myInput" type="text" name="values" placeholder="Type Here">
              </div>
              <input value="search" name="search" type="submit">
            </form></div>
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
                        <li onclick="show_my_upload()">My Uploads</li>
                        <li onclick="show_uploading()">Upload New</li>
                        <li onclick="show_profile()">My Profile</li>
                        <li onclick="show_analytics()">Analytics</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content">
                            <!--search -->
            <div style="display: block" id="search_result_photo" align="center">
                <?php
            $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
            mysqli_select_db($conn,"crud");
            ?>
                <h1>Search Result</h1>
                 <?php
                    if(isset($_POST["search"])){
                        $search_value=$_POST["values"];
                        $s_query="SELECT * FROM pictures WHERE username='$search_value' OR tags LIKE '%$search_value%'";
                        $inc_tag="SELECT * FROM tags WHERE tag='$search_value'";
                        $inc_result=mysqli_query($conn,$inc_tag);
                        while($inc_row=mysqli_fetch_array($inc_result)){
                          $inc_no=$inc_row["search_no"];
                          $inc_no=$inc_no+1;
                          $update_inc="UPDATE tags SET search_no='$inc_no' WHERE tag='$search_value'";
                          mysqli_query($conn,$update_inc);
                        }
                        $s_result=mysqli_query($conn,$s_query);
                        while($s_row=mysqli_fetch_array($s_result)){
                            $search_image=$s_row["image"];
                            $search_username=$s_row["username"];
                            $search_tags=$s_row["tags"];
                            $search_tmp=$s_row["tmp"];
                            ?>
                            <div style=" box-shadow: 0 0 3pt 1.5pt #9d012e;display: flex;">
                              <div style="margin-left: 10px">
                    <br>
                <?php
                echo "<img style='border-radius: 8px; height: 300px; width: 600px;' src='data:image/png;base64,".base64_encode($search_tmp)."' alt='Profile Picture' class='avatar' >";
                ?><br><br>
                <div>TAGS : <?php echo $search_tags?></div>
                <br>
                </div>
                <div>
                  <?php
                  $search_profile="SELECT * FROM users WHERE username='$search_username'";
                  $search_profile_query=mysqli_query($conn,$search_profile);
                  while($profile_row=mysqli_fetch_array($search_profile_query)){
                    $profile_name=$profile_row["name"];
                    $profile_username=$profile_row["username"];
                    $profile_email=$profile_row["email"];
                    $profile_gender=$profile_row["gender"];
                    $profile_pic=$profile_row["profilepic"];
                    $profile_tmp=$profile_row["tmp"];
                    ?>
                    <div class="card" style="margin-left: 200px;">
                      By.
                <?php
                echo "<img style='border-radius: 8px; width: 100%;' src='data:image/png;base64,".base64_encode($profile_tmp)."' alt='Profile Picture' >";
                ?>
              <h1><?php echo $profile_name ?></h1>
              <p class="title"><?php echo $profile_username ?></p>
              <p><?php echo $profile_email ?></p>
              <p><?php echo $profile_gender ?></p>
              <div style="margin: 24px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
              <p><button>Contact</button></p>
            </div>
                    <?php
                  }
                  ?>
                </div>
                </div>
                <br><br>
                            <?php
                        }
                    }
                 ?>
             </div>
              <!--ANALYTICS -->
              <div style="display: none;" id="analytics">
                <div style="display: flex;">                
                  <?php
                $ana_tags="SELECT * FROM tags WHERE username='$username'";
                $ana_download="SELECT * FROM pictures WHERE username='$username'";
                $tags_result=mysqli_query($conn,$ana_tags);
                $down_result=mysqli_query($conn,$ana_download);
                ?>
                <div>
                  <table style="border-collapse: collapse;width: 100%;">
                    <tr><td style="text-align: left;padding: 8px;">tags</td><td style="text-align: left;padding: 8px;">No.Times Searched</td></tr>
                    <?php
                while($tag_row=mysqli_fetch_array($tags_result)){
                  $tag_name=$tag_row["tag"];
                  $tag_no=$tag_row["search_no"];
                  ?>
                    <tr><td style="text-align: left;padding: 8px;"><?php echo $tag_name; ?></td><td style="text-align: left;padding: 8px;"><?php echo $tag_no; ?></td></tr>
                  <?php
                }               
                ?>
              </table>
            </div>
            <div style="margin-left: 250px;">
              <?php
              $count=0;
              while($down_row=mysqli_fetch_array($down_result)){
                    $down_pic=$down_row["image"];
                    $down_tags=$down_row["tags"];
                    $down_tmp=$down_row["tmp"];
                    $down_id=$down_row["download"];
                    if($count%2==0){
                      echo "<div style='display:flex;'>";
                    }
                echo "<div style='margin-left:10px;'><img style='border-radius: 8px; height: 150px; width: 300px;' src='data:image/png;base64,".base64_encode($down_tmp)."' alt='Profile Picture' class='avatar' >";
                echo "<br>Downloads : ";
                echo $down_id;
                echo "<br><br></div>";
                if($count%2!=0){
                  echo "</div>";
                }
                $count++;
              }
              if($count%2!=0)
              {
                echo "</div>";
              }
              ?>
            </div>
          </div>
              </div>  


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
            </div>

            <!--Adding_image-->
            <div style="display: none;" id="adding_image" >
            <form name="add_pic" action="" method="POST" enctype="multipart/form-data">
                <table align="center" style="margin-top: 50px;">
                    <tr><td>Choose Pic : </td><td><input style="background: transparent;" type="file" name="photos"></td></tr>
                    <tr><td>Tags : </td><td><textarea style="background: transparent; border: none;border-bottom: 2px solid #9d012e" placeholder="Type Here" name="tags"></textarea></td></tr>
                </table>
                <br><br>
                <input type="submit" name="add_pic_sub">
            </form>
            <?php
            
            if(isset($_POST['add_pic_sub']))
            {
                $picname=$_FILES["photos"]["name"];
                $tags=$_POST["tags"];
                $eachtags=explode(",",$tags);
                $imagetmp=addslashes(file_get_contents($_FILES['photos']['tmp_name']));
                $add_pic="INSERT INTO pictures(username,image,tmp,tags,download)  values('$username','$picname','$imagetmp','$tags',0)";
                if(mysqli_query($conn,$add_pic))
                {
                  foreach($eachtags as $tag_value)
                  {
                      $add_tags="INSERT INTO tags(username,tag,search_no) values('$username','$tag_value',0)";
                      mysqli_query($conn,$add_tags);
                  }
                    echo "<script>alert('Picture Added Succesfully ');</script>";
                }
            }
            ?>
            </div>
                

                <!--Explore-->
                <div id="explore_div" style="display: none;">
                  <div style="margin-top: 10px; margin-bottom: 10px;"><form action="filter.php" method="POST">FILTER : <select name="filter">
                                                                                            <option value="random">Random</option>
                                                                                            <option value="date">Date Created</option>
                                                                                          </select>
                                                                                          <input type="submit" name="submit" value="FILTER">
                                                                                        </form></div> 
                <?php
                $explore_query="SELECT * FROM pictures ORDER BY rand()";
                $explore_result=mysqli_query($conn,$explore_query);
                $total_photos=mysqli_num_rows($explore_result);
                $total_pages=ceil($total_photos/2);
                $ini=0;
                $x=1;
                while($explore_row=mysqli_fetch_array($explore_result)){
                    $explore_username=$explore_row["username"];
                    $explore_pic=$explore_row["image"];
                    $explore_tags=$explore_row["tags"];
                    $explore_tmp=$explore_row["tmp"];
                    $explore_id=$explore_row["id"];
                    if($ini==0){
                      ?>
                      <div style="display: block;" id="<?php echo $x; ?>">
                      <?php
                    }
                    else if($ini%2==0){
                       ?>
                      <div style="display: none;" id="<?php echo $x; ?>">
                      <?php
                    }
                ?>
                <div style=" box-shadow: 0 0 3pt 1.5pt #9d012e;;">
                    <br>
                <?php
                echo "<img style='border-radius: 8px; height: 300px; width: 600px;' src='data:image/png;base64,".base64_encode($explore_tmp)."' alt='Profile Picture' class='avatar' >";
                ?>
                <br><br>
                <div>TAGS : <?php echo $explore_tags?></div><div>By  <?php echo $explore_username?></div>
                <div><?php echo "<a href='data:image/png;base64,".base64_encode($explore_tmp)."' download>"; ?><button onclick="inc_down('<?php echo $explore_id; ?>')" style="width: 100px; border-radius: 5px; background-color: #9d012e">download</button></a></div>
                <br>
                </div>
                <br><br>
                <?php
                if($ini%2==1){
                      echo "</div>";
                      $x++;
                    }
                    $ini++; 
                } 
              if($ini%2!=0){
                echo "</div>";
              }
                ?>
                <div class="pagination">
                <a href="#">&laquo;</a>  
                <?php
                $i=1;
                while($total_pages+1!=$i){
                  ?>
                  <a href="#" onclick="show_page(<?php echo $i; ?>,<?php echo $total_pages; ?>)"><?php echo $i; ?></a>
                  <?php  
                  $i++;
                } 
                ?>
                <a href="#">&raquo;</a>
                </div>
                </div>
                <!--Own_image_setting-->
                <div id="uploads_div" style="display: none;">
                <?php
                $display_own="SELECT * FROM pictures WHERE username='$username'";
                $display_own_result=mysqli_query($conn,$display_own);
                while($own_row=mysqli_fetch_array($display_own_result)){
                    $own_pick=$own_row["image"];
                    $own_tags=$own_row["tags"];
                    $own_id=$own_row["id"];
                    $own_tmp=$own_row["tmp"];
                    ?>
                    <?php
                echo "<img style='border-radius: 8px; height: 300px; width: 600px;' src='data:image/png;base64,".base64_encode($own_tmp)."' alt='Profile Picture' class='avatar' >";
                ?>
                
                    <form method="POST" action="">
                      <br>TAGS : <textarea style="background: transparent; border: none;border-bottom: 2px solid #9d012e" name="updated_tags" rows="2" cols="10"><?php echo $own_tags?></textarea>
                      <input type="hidden" name="id1" value="<?php echo $own_id ?>">
                      <input type="submit" name="update" value="update">
                    </form>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $own_id ?>"><br>
                        <center>
                      <input type="submit" name="delete" value="delete">
                      </center>
                    </form>
                    <hr>
                    <?php
                    
                }
                if(isset($_POST['update'])){
                  $update_id=$_POST['id1'];
                  $update_tags=$_POST['updated_tags'];
                  $each_updated_tags=explode(",",$update_tags);
                  $update_query="UPDATE pictures SET tags='$update_tags' where id='$update_id'";
                  if(mysqli_query($conn,$update_query))
                    {
                        foreach($each_updated_tags as $tag_values)
                        {
                            $add_tagss="INSERT INTO tags(username,tag,search_no) values('$username','$tag_values',0)";
                            mysqli_query($conn,$add_tagss);
                        }
                        echo "<script>alert('Tags Updated !');</script>";
                    }
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