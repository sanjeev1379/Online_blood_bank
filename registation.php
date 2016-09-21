<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$uemail = htmlentities($_GET['q']);

$result=mysql_query("select * from blood_sign where email='$uemail'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>
<?php

if(isset($_POST['register'])){

    @$uemail_p = htmlentities($_GET['q']);
  $name=$_POST['name'];
  $blood_group=$_POST['blood_group'];
  $mobile_no=$_POST['mobile_no'];
  $address=$_POST['address'];

  @$image=$_FILES['image']['name'];
  @$image_tmp=$_FILES['image']['tmp_name'];

  @move_uploaded_file($photo_tmp,"profile_image/$image");

  if(!empty($name)&&!empty($address)&&!empty($blood_group)&&!empty($mobile_no)){
    if(@($password_hash!=$password_again_hash)){

      }else{
      $insert_blood_reg="INSERT into blood_reg (name,blood_group,mobile_no,address,image) values('$name','$blood_group','$mobile_no','$address','$image')";
      $insert_blood_reg_pro=mysqli_query($con,$insert_blood_reg);
      if($insert_blood_reg_pro){
        echo "<script>alert('Thanku! you are successfully Registerd.')</script>";
        echo  "<script>window.open('home.php?q=$uemail_p','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('registation.php?q=$uemail_p','_self')</script>";
  }
}
?>
<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | Registation</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width-device-width scale=1.0" />
  <link rel="shortcut icon" href="image/icon.jpg" ></link>
  <link rel="stylesheet" href="css/style.css" ></link>
  <link rel="stylesheet" href="css/circle-hover.css" ></link>
  <link rel="stylesheet" href="css/bootstrap.min.css" ></link>
  <script type="text/javascript" src="js/script.js" ></script>
  <script type="text/javascript" src="js/jquery.min.js" ></script>
  <script type="text/javascript" src="js/bootstrap.min.js" ></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container" >
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar" >
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="home.php?q=<?php echo $uemail ?>" class="navbar-brand"><img id="image_1" src="image/logo.jpg" class="img-circle"/></a>
        <a href="home.php?q=<?php echo $uemail ?>" id="header_font" class="navbar-brand">Blood Bank System</a>
      </div>
      <div class="navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right">
          <li><a id="left" href="#">Welcome <?php echo "<font id='new_user'>".@$name_database."</font>"; ?></a></li>
          <li><a id="left" href="home.php?q=<?php echo $uemail ?>">Home</a></li>
          <li class="active"><a id="left" href="#">Donor Registation</a></li>
          <li><a id="left" href="search_donor.php?q=<?php echo $uemail ?>">Search Donor</a></li>
          <li><a id="left" href="contact.php?q=<?php echo $uemail ?>">Contact Us</a></li>
          <li><a id="left" href="index.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
        <center><div class="modal-content c">
          <div class="modal-header">
            <h2 class="modal-title" id="log">Donor Registation :</h2>
          </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
            <span class='label label-info' id="n">  User Id : </span>
            <input type="text" class="form-control" name="" placeholder="<?php echo @$name_database ?>" disabled />
          </div>
          <div class="form-group">
            <span class='label label-info' id="n">  Enter Name : </span>
            <input type="text" class="form-control" name="name" placeholder="Enter Name...">
          </div>
          <div class="form-group" style="width:55%;">
            <span class='label label-info' id="n">  Blood Group : </span>
            <select class="form-control" id="sel1" name="blood_group">
              <option>Select Blood Group</option>
                         <?php
                         $get_blood_group= "select * from blood_groups";
                         $run_cats=mysqli_query($con,$get_blood_group);
                         while($row_cats=mysqli_fetch_array($run_cats)){
                           $blood_group_id=$row_cats['blood_group_id'];
                           $blood_group=$row_cats['blood_group'];
                           echo "<option value='$blood_group'>$blood_group</option>";

                         }
                         ?>
            </select>
          </div>
          <div class="form-group">
            <span class='label label-info' style="float:center;" id="n">  Contact No : </span>
            <input type="text" class="form-control" name="mobile_no" placeholder="Contact No....">
          </div>
          <div class="form-group">
            <span class='label label-info' id="n">  Address : </span>
              <textarea class="form-control" rows="5" name="address" id="comment" placeholder="Address..."></textarea>
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Profile Image : </span>
              <label class="btn btn-primary" for="my-file-selector"  style="background-color:#D4DEDD; color:black;">
              <input id="my-file-selector" name="image" type="file" style="display:none;color:white;" onchange="$('#upload-file-info').html($(this).val());">
                Browse..
              </label>
              <span class='label label-info' id="upload-file-info"></span>
            </div>
      </div>
      <div class="modal-footer">
        <input id="bt" class="btn btn-primary btn-block" name="register" type="submit" value="Register" />
      </div>
      </form>
    </div></center>
  </div>
</div>
  <nav class=" navbar navbar-inverse">
    <div class="container-fluid" >
      <p id="footer">devloped by BCE Bhagalpur itsolutation. Website: <a href="bcebhagalpur.ac.in">bcebhagalpur.ac.in</a></p>
    </div>
  </nav>
</body>
</html>
