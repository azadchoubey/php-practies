

<html>
<head>
<script src="js/jquery.js"></script>

<style>

table

{

border-style:solid;

border-width:1px;
padding: 5px;
border-color:green;
 font-size:20px;

}

</style>



</head>
<body>
    <div>
<form action="new.php" method="post">
<table><tr><td>Username </td>
<td><input type="text" name="username" />  </td><br>
<tr><td>Password </td>
<td><input type="password" name="pasword"/>   </td><br>
<tr>
<td><input type="submit" value="Add" name="btn_submit" />  </td>

<td><input type="submit"  value="remove" name ="btn_submit"/>  </td> </form>
</div>

<form action="new.php" method="get">
<td><input type="submit" id="button" value="show" name ="btn_submit1"/> </tr> </td> </table>
</form>
<!--
<form action="new.php" method="POST">
<tr>
<td><input type="submit" id="button" value="remove" name ="remove"/>  </td>
</tr> 
//pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"> 
</form> -->
</body>


</html>    <?php

//checking the request method is post or not
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $server="localhost";
 $username="root";
 $password="";
 $database="login";
 $user=$_POST['username'];
 $pass=$_POST['pasword'];


    //swithing the button as per there actions by usig valu &
switch ($_REQUEST['btn_submit']) 
{ 
    case "Add":
        $user=$_POST['username'];
        $pass=$_POST['pasword'];
    $conn=mysqli_connect($server,$username,$password,$database);
    $sql = "INSERT INTO `username`(`User`, `Password`) VALUES ('$user','$pass')"; 
    $RESULT= mysqli_query($conn, $sql);
   
    //$tabl = "SELECT * FROM `username`";
   // $RESULT= mysqli_query($conn, $tabl);   
   if(!$RESULT){
    $check=mysqli_error($conn);

       echo"<p align='center'> <font color=red size='2px'>Failed to update.$check</font> </p>";
   }
   else{
   echo "<p align='center'> <font color=green  size='2px'>New record successfully recorded</font> </p>";
   }    
   break;
   case "remove":
    $conn=mysqli_connect($server,$username,$password,$database);
    $remove= "DELETE FROM `username` WHERE `username`.`User` = '$user'";
    $cheking = "SELECT * FROM `username` WHERE `username`.`User` = '$user'";
    $cheking1 = mysqli_query($conn, $cheking);
    $row1 = mysqli_fetch_assoc( $cheking1); //coverting the result in string 
    if($row1==null) {

        echo"<p align='center'> <font color=red  size='2px'>No entry found</font> </p>";
    }
    else{
        $REM= mysqli_query($conn, $remove);
        echo"<p align='center'> <font color=red  size='2px'>Record successfully Deleted</font> </p>";
    }
  
    break;
    
    default:
    echo"<p align='center'> <font color=green  size='3px'>opretion Failed</font> </p>";
};
}
if(isset($_GET["btn_submit1"])) { 
    $server="localhost";
  $username="root";
 $password="";
 $database="login"; $conn=mysqli_connect($server,$username,$password,$database);
$dis = "SELECT * FROM `username`";
$disply = mysqli_query($conn, $dis);
if (mysqli_num_rows($disply) > 0) {
    echo " <table>
    <tr>
    <th>Username</th>
    <th>Paqssword</th>
    </tr>";


    // output data of each row  
    while($row = mysqli_fetch_assoc($disply)) {
        echo "<tr>";
        echo "<td>" . $row['User'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
  } else {
    echo "0 results";
  }
  



};
?>