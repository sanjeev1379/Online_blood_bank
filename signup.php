<?php
include("includes/db.php");
include("includes/connection.php");

if(isset($_POST['signup_submit'])){
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $sex=$_POST['sex'];
  $email=$_POST['email'];
  $mobile_no=$_POST['mobile_no'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $password_hash=md5($password); //when password is converted in to md5 then must change the code of line 24 or converted $password into $password_hash and $password_again into $password_again_hash
  $again_password=$_POST['again_password'];
  $again_password_hash=md5($again_password);

  if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($again_password)&&!empty($mobile_no)&&!empty($first_name)&&!empty($last_name)){
    if($password_hash!=$again_password_hash){
      echo "<script>alert('Password do not match!')</script>";
      echo  "<script>window.open('signup.php','_self')</script>";
    }else{
      $query="INSERT INTO blood_sign (first_name,last_name,sex,email,mobile_no,city,address,username,password,again_password) VALUES ('$first_name','$last_name','$sex','$email','$mobile_no','$city','$address','$username','$password_hash','$again_password_hash')";
      $query_run=mysqli_query($con,$query);
      if($query_run){
        echo "<script>alert('Thanks! You are Sucessfully Register. Please Login.')</script>";
        echo  "<script>window.open('signin.php','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
    }

  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('signup.php','_self')</script>";
  }
}
@mysqli_free_result($query);
@mysqli_close($dbh);

?>
<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | Sign Up</title>
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
          <li><a id="left" href="signin.php">Sign In</a></li>
          <li class="active"><a id="left" href="#">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
        <center><div class="modal-content c">
          <div class="modal-header">
            <h2 class="modal-title" id="log">Sign Up</h2>
          </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
            <input type="text" class="form-control" name="first_name" placeholder="First Name...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
          </div>
          <div class="form-group" style="width:55%;">
            <select class="form-control" id="sel1" name="sex">
              <option>Select Gender</option>
              <option >Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email....">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="mobile_no" placeholder="Contact No....">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="city" placeholder="City....">
          </div>
          <div class="form-group">
              <textarea class="form-control" rows="5" name="address" id="comment" placeholder="Address..."></textarea>
            </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username....">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password....">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="again_password" placeholder="Confirm Password....">
          </div>
      </div>
      <div class="modal-footer">
        <input id="bt" class="btn btn-primary btn-block" name="signup_submit" type="submit" value="Sign Up" />
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
