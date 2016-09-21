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

if(isset($_POST['search'])){
  $search_blood_group = $_POST['blood_group'];
  $result_blood_group=mysql_query("select * from blood_reg where blood_group LIKE '%$search_blood_group' ");
  if(!$result_blood_group)
  echo "Error in query.. <br />";
  else {
    header("Location:results.php?q=$uemail&blood_group=".$search_blood_group);
  }
}
@mysqli_free_result($result_blood_group);
@mysqli_close($dbh);

?>


<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Blood Bank | Result</title>
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
          <li ><a id="left" href="registation.php?q=<?php echo $uemail ?>">Donor Registation</a></li>
          <li class="active"><a id="left" href="search_donor.php?q=<?php echo $uemail ?>">Search Donor</a></li>
          <li><a id="left" href="contact.php?q=<?php echo $uemail ?>">Contact Us</a></li>
          <li><a id="left" href="index.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" id="bg">
    <div class="container d">
        <div class="modal-content s">
        <div class="modal-header">
          <h2 class="modal-title" id="log_q">View Result :</h2>
          <form action="" method="post" enctype="multipart/form-data" >
          <div  style="float:right; margin-right:20%; margin-top:1%;">
            <div class="form-group" style="width:100%;">
              <select class="form-control" id="sel1" name="blood_group">
                <option>Blood Group</option>
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
            <div style="float:right; margin-right:-100%; margin-top:-50%; width:100%;" class="modal-footer" >
              <input id="bt" class="btn btn-primary btn-block" name="search" type="submit" value="Search" />
            </div>
           </div>
         </form>
        </div>

        <table class="table q" border="1" style="background-color:red;">
          <thead>
            <tr>
              <td id="k"style="color:white;">S.no</td>
              <td id="k" style="color:white;">Photo</td>
              <td id="k" style="color:white;">Name</td>
              <td id="k" style="color:white;">Blood Group</td>
              <td id="k" style="color:white;">Contact No</td>
              <td id="k" style="color:white;">Address</td>
            </tr>
          </thead>
        </table>

        <?php

            $con=mysqli_connect("localhost","root","","blood_bank");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;

        @$search_blood_group = htmlentities($_GET['blood_group']);

          $get_pro="select * from blood_reg where blood_group LIKE '%$search_blood_group' ";
          $run_pro=mysqli_query($con,$get_pro);

             $sno =1;
              while($row_pro=mysqli_fetch_array($run_pro)){
                 $pro_sno=$sno;
    //$pro_student_id=$row_pro['student_id'];
                 $pro_profile_image=$row['image'];
                 $pro_name=$row_pro['name'];
                 $pro_blood_group=$row_pro['blood_group'];
                $pro_mobile_no=$row_pro['mobile_no'];
                $pro_address=$row_pro['address'];
             $sno++;
         echo "

    <table class='table q'>
    <tbody>
     <tr>
       <td width='9%'><font id='user_result'>$pro_sno</font></td>
       <td width='18%'><font id='user_result'><img src='profile_image/$pro_profile_image' width='70' height='70' /></font></td>
       <td width='8%'><font id='user_result'>$pro_name</font></td>
       <td width='28%'><font id='user_result'>$pro_blood_group</font></td>
       <td width='20%'><font id='user_result'>$pro_mobile_no</font></td>
       <td width='20%'><font id='user_result'>$pro_address</font></td>
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
