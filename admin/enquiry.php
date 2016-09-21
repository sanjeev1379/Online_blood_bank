<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$username = htmlentities($_GET['q']);

$result=mysql_query("select * from admin_sign where username='$username'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>
<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | Enquiry</title>
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
        <a href="home.php?q=<?php echo $username ?>" class="navbar-brand"><img id="image_1" src="image/logo.jpg" class="img-circle"/></a>
        <a href="home.php?q=<?php echo $username ?>" id="header_font" class="navbar-brand">Blood Bank System</a>
      </div>
      <div class="navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right">
          <li><a id="left" href="#">Welcome <?php echo "<font id='new_user'>".@$name_database."</font>"; ?></a></li>
          <li><a id="left" href="home.php?q=<?php echo $username ?>">Home</a></li>
          <li><a id="left" href="search_donor.php?q=<?php echo $username ?>">Search Donor</a></li>
          <li class="active"><a id="left" href="enquiry.php?q=<?php echo $username ?>">View Enquiry</a></li>
          <li><a id="left" href="index.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
        <div class="modal-content s">
        <div class="modal-header">
          <h2 class="modal-title" id="log_q">View Enquiry :</h2>
        </div>

        <table class="table q" border="1" style="background-color:red;">
          <thead>
            <tr>
              <td id="h" style="color:white;">S.no</td>
              <td id="h" style="color:white;">Name</td>
              <td id="h" style="color:white;">Contact No</td>
              <td id="h" style="color:white;">Blood Group</td>
            </tr>
          </thead>
        </table>

        <?php

            $con=mysqli_connect("localhost","root","","blood_bank");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;

          $get_pro="select * from blood_send";
          $run_pro=mysqli_query($con,$get_pro);
             $sno =1;
              while($row_pro=mysqli_fetch_array($run_pro)){
                 $pro_sno=$sno;
    //$pro_student_id=$row_pro['student_id'];
                 $pro_name=$row_pro['username'];
                  $pro_mobile_no=$row_pro['mobile_no'];
                 $pro_blood_group=$row_pro['blood_group'];
             $sno++;
         echo "

    <table class='table q'>
    <tbody>
     <tr>
       <td width='11%'><font id='user_result'>$pro_sno</font></td>
       <td width='18%'><font id='user_result'>$pro_name</font></td>
       <td width='20%'><font id='user_result'>$pro_mobile_no</font></td>
       <td width='28%'><font id='user_result'>$pro_blood_group</font></td>
          </tr>
      </tbody>
    </table>


    ";
  }
  ?>

      </div>
    </div>
  </div>
  <nav class=" navbar navbar-inverse">
    <div class="container-fluid" >
      <p id="footer">devloped by BCE Bhagalpur itsolutation. Website: <a href="bcebhagalpur.ac.in">bcebhagalpur.ac.in</a></p>
    </div>
  </nav>
</body>
</html>
