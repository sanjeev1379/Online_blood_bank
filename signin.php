<?php
include("includes/db.php");


if(isset($_POST['signin_submit'])){
  $username = htmlentities($_POST['username']);
  $password = htmlentities($_POST['password']);
  $password_hash=md5($password); //when password is converted in to md5 then must change the code of line 20 or converted $password into $password_hash
  if(!empty($username)&&!empty($password_hash)){
    $result="select * from blood_sign where username='$username'";
    $result_run=mysqli_query($con,$result);
    if(!$result_run)
    echo "Error in query.. <br />";
    else {
      while($row=mysqli_fetch_array($result_run,MYSQLI_ASSOC))
      {
        $email_database=$row['email'];
        $password_database_hash=$row['password'];
        $username_database=$row['username'];
      }
      //echo $uid_database;
      if(@($username==$username_database)&&($password_hash==$password_database_hash)){
        //require 'profile.php';
        header("Location:home.php?q=".$email_database);
      } else {
        echo "<script>alert('Please Enter a Correct Username and Password!')</script>";
        echo  "<script>window.open('signin.php','_self')</script>";
      }
    }
  }else{
    echo "<script>alert('All Field are required!')</script>";
    echo  "<script>window.open('signin.php','_self')</script>";
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);


?>
<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | Sign In</title>
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
        <a href="index.php" class="navbar-brand"><img id="image_1" src="image/logo.jpg" class="img-circle"/></a>
        <a href="index.php" id="header_font" class="navbar-brand">Blood Bank System</a>
      </div>
      <div class="navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right">
          <li><a id="left" href="index.php">Home</a></li>
          <li class="active"><a id="left" href="#">Sign In</a></li>
          <li><a id="left" href="signup.php">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
        <center><div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="log">Sign In</h2>
          </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="signin_submit" id="bt" class="btn btn-primary btn-block" value="Sign In" />
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
