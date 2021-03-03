<?php
$loginbtn =true;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user=$_POST['Username'];
  $pass=$_POST['Password'];
  
require 'db_confiq.php';
$sql = "SELECT * FROM `user_login` WHERE `Username`= '$user'";
$RESULT= mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($RESULT);
  if ($numrows > 0){
    while($row = mysqli_fetch_assoc($RESULT))
    { if ($pass==$row['Password'] ){
      session_start();
  
      $_SESSION["username"] = $user;
      $_SESSION["login_time_stamp"] = time();   
          $loginbtn=false;
    }
    else{
      echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <center><strong>invaild password ! </strong> </center>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

    }
    }
  }else {
    echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <center><strong>invaild  username ! </strong> </center>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  
      
  }



}






?>


<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sty.css">
    <title>Home</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body> 
  <?php
  include 'navbar.php';
  
  ?>

<?php

if($loginbtn){
  echo'<div class="countair">
  <form action="home.php" method="post">
    <p style="margin-top: 35px; text-align: center; font-size: 30px;"> Login Your Account </p>
   
  <input type="text" placeholder="Username" style="margin-top: 10px;" class="form" name="Username" /><br>
  <input type="Password" placeholder="Password" class="form"  name="Password" /><br>
  <input type="submit" Value="Login" class="buttom"  name="submit"/>
  </form>
  </div>';
  

}


?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>