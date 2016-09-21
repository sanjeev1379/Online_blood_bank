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

$result=mysql_query("select * FROM blood_sign WHERE email='$uemail_1'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$first_name_database=$row['first_name'];
    @$last_name_database=$row['last_name'];
    @$email_database=$row['email'];
    @$mobile_no_database=$row['mobile_no'];
    @$city_database=$row['city'];
    @$address_database=$row['address'];
    @$username_database=$row['username'];

    }

}

?>
<?php
if(isset($_POST['update'])){

  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $mobile_no=$_POST['mobile_no'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $username=$_POST['username'];

  if(/*!empty(@$room_no)&&*/!empty($first_name)&&!empty($last_name)&&!empty($city)){
    if(@($password_hash!=$password_again_hash)){

    }else{
      @$blood="UPDATE `blood_sign` SET /*`room_no`='@$room_no' ,*/ `username`='$username' ,`city`='$city' , `first_name`='$first_name' , `address`='$address' , `mobile_no`='$mobile_no' , `last_name`='$last_name', `email`='$email' WHERE `email`='$uemail' ";
      $blood_pro=mysqli_query($con,$blood);
      if($blood_pro){
        echo "<script>alert('Thanku! Your Account is Updated !.')</script>";
        echo  "<script>window.open('home.php?q=$uemail_1','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
    }

  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('update_account.php?q=$uemail_1','_self')</script>";
  }
}
?>

<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | Update Account</title>
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
          <li class="active"><a id="left" href="#">Welcome <?php echo "<font id='new_user'>".@$name_database."</font>"; ?></a></li>
          <li><a id="left" href="home.php?q=<?php echo $uemail ?>">Home</a></li>
          <li><a id="left" href="#">Donor Registation</a></li>
          <li><a id="left" href="#">Search Donor</a></li>
          <li><a id="left" href="#">Blood Bank</a></li>
          <li><a id="left" href="index.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
      <center><div class="modal-content s">
        <div class="modal-header">
          <h2 class="modal-title" id="log_1">Update Account :</h2>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="" enctype="multiplepart/form">
            <div class="form-group">
              <input type="text" class="form-control" name="first_name" value="<?php echo $first_name_database ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="last_name" value="<?php echo $last_name_database ?>">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" value="<?php echo $email_database ?>" disabled >
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="mobile_no" value="<?php echo $mobile_no_database ?>" disabled >
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="city" value="<?php echo $city_database ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="5" name="address" id="comment" placeholder="<?php echo $address_database ?>"></textarea>
              </div>
            <div class="form-group">
              <input type="text" class="form-control" name="username" value="<?php echo $username_database ?>" disabled >
            </div>
        </div>
        <div class="modal-footer">
          <input id="bt" class="btn btn-primary btn-block" name="update" type="submit" value="Update" />
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
