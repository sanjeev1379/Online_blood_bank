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
require_once 'includes/connection.php';

@$uemail_1 = htmlentities($_GET['q']);

$result=mysql_query("select * from blood_sign where email='$uemail_1'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$username_database=$row['username'];
    @$email_database=$row['email'];
    @$mobile_no_database=$row['mobile_no'];
    }

}

?>

<?php
if(isset($_POST['send'])){

  @$uemail_p = htmlentities($_GET['q']);
  $username=$_POST['username'];
  $email=$_POST['email'];
  $blood_group=$_POST['blood_group'];
  $mobile_no=$_POST['mobile_no'];

  if(/*!empty(@$room_no)&&*/empty($blood_group=='Select Blood Group')){
    if(@($password_hash!=$password_again_hash)){

    }else{
      $send_blood_reg="INSERT into blood_send (username,email,blood_group,mobile_no) values('$username','$email','$blood_group','$mobile_no')";
      $send_blood_reg_pro=mysqli_query($con,$send_blood_reg);
      if($send_blood_reg_pro){
        echo "<script>alert('Thanku! you are successfully Send Request.')</script>";
        echo  "<script>window.open('home.php?q=$uemail_p','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('Please Select Blood Group!')</script>";
    echo  "<script>window.open('contact.php?q=$uemail_p','_self')</script>";
  }
}
?>

<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | contact us</title>
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
          <li><a id="left" href="registation.php?q=<?php echo $uemail ?>">Donor Registation</a></li>
          <li><a id="left" href="search_donor.php?q=<?php echo $uemail ?>">Search Donor</a></li>
          <li class="active"><a id="left" href="#">Contact Us</a></li>
          <li><a id="left" href="index.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
      <center><div class="modal-content s">
        <div class="modal-header">
          <h2 class="modal-title" id="log_1">Contact Us :</h2>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="" enctype="multipart/form-data" >
            <div class="form-group">
              <span class='label label-info' id="n">  Username </span>
              <input type="text" name="username" class="form-control" value="<?php echo $username_database ?>" >
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Email </span>
              <input type="text" name="email" class="form-control" value="<?php echo  $email_database ?>" >
            </div>
            <div class="form-group" style="width:55%;">
              <span class='label label-info' id="n">  Blood Group </span>
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
              <span class='label label-info' id="n">  Mobile No </span>
              <input type="text" name="mobile_no" class="form-control" value="<?php echo $mobile_no_database ?>" >
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="send" id="bt" class="btn btn-primary btn-block" value="Send" />
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
