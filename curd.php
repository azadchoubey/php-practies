
<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>

    <title>easyNote!</title>
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">   
        <div class="container-fluid">
            <a class="navbar-brand" href="curd.php">easyNote</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_POST['snoEdit'])){
//update the records
$sno=$_POST['snoEdit'];
$title=$_POST['titleEdit'];
$note=$_POST['noteEdit'];

require 'db_config.php';
$sql ="UPDATE `$database` SET `Title` = '$title' ,  `note` = '$note' , `time` = CURRENT_TIMESTAMP WHERE `notes`.`Sno` = '$sno'";  
$RESULT= mysqli_query($conn, $sql);

if($RESULT){   
  echo"
<div class='alert alert-success alert-dismissible fade show' role='alert'>
<center><strong>Success!</strong> Information Updated Successfully</center>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
else{
  echo"
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <center><strong>failed to update ! </strong> </center>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
}
elseif(isset($_POST['delNotes'])){

    $sno=$_POST['delNotes'];
    $title=$_POST['delTitle'];
    $note=$_POST['delnote'];
    
    require 'db_config.php';
    
    $sql = "DELETE FROM `notes` WHERE `notes`.`Sno` = '$sno';";
    $RESULT= mysqli_query($conn, $sql);
    
    if($RESULT){   
      echo"
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <center><strong>Success!</strong> Information Deleted Successfully</center>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    else{
      echo"
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <center><strong>failed to update ! </strong> </center>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
    }
    
else{

$title=$_POST['title'];
$note=$_POST['note'];


require 'db_config.php';

$sql ="INSERT INTO `notes` (`Sno`, `Title`, `note`, `time`) VALUES (NULL, '$title', '$note', CURRENT_TIMESTAMP);";
  

$RESULT= mysqli_query($conn, $sql);
if($RESULT){   
  echo"
<div class='alert alert-success alert-dismissible fade show' role='alert'>
<center><strong>Success!</strong> Information Added Successfully</center>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
else{
  echo"
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <center><strong>failed to update ! </strong> </center>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }


}}
if(isset($_POST['upload']))
{
    require 'upload.php'; 

}







?>


    <h3 class="container mt-3"><u>
            <center>Welcome to easyNote!</center>
        </u> </h3>
    <hr>
    <div class="container mt-3">

        <h3> Add a Note!</h3>
        <div class="mb-3">
            <form action="curd.php" method="POST">
                <label for="exampleFormControlInput1" class="form-label">Add Title</label>
                <input type="text" class="form-control" id="title" name="title" required><br>
                <label for="exampleFormControlTextarea1" class="form-label"> Take Note</label>
                <textarea class="form-control" id="note" name="note" rows="3" required></textarea><br>
               
                <input type="submit" class="btn btn-primary" value="Submit"></button>
            </form>
            <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:

  <input type="file" class="btn btn-primary" name="fileToUpload" id="fileToUpload">
  <input type="submit" class="btn btn-primary"value="Upload Image" name="upload">
  </form>
        </div>
    </div>
    <hr>
    <?php
require 'db_config.php';
$dis = "SELECT * FROM `$database`";
$disply = mysqli_query($conn, $dis);
if (mysqli_num_rows($disply) > 0) {
  $sno=0;
  ?>
    <table id="table" class="display">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Title</th>
                <th>Notes</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php while($row = mysqli_fetch_assoc($disply)) {
      $sno+1;
      $sno++;?>
            <tr>
                <td> <?php echo $sno ?> </td></strong>
                <td><?php echo $row['Title'];?> </td>
                <td><?php echo $row['note'];?> </td>
                <td><?php echo $row['time'];?> </td>
                <td> <button type="button" id='  <?php echo $row['Sno'];?> ' class=" edit btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>
                    <button type="button" class=" delete btn btn-primary"  id=' <?php echo $row['Sno'];?> ' data-bs-toggle="modal" data-bs-target="#exampleModal2"
                        data-bs-whatever="@getbootstrap">Delete</button>
                </td>
            </tr>
            <?php }?>
            <?php }?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="curd.php" method="POST">
                <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Note:</label>
                            <textarea class="form-control" id="noteEdit" name= "noteEdit"></textarea>
                        </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete The Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="curd.php" method="POST">
                <input type="hidden" name="delNotes" id="delNotes">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="delTitle"name="delTitle">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Note:</label>
                            <textarea class="form-control" id="delnote" name="delnote"></textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    <button type="Submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
    </script>

    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
        element.addEventListener("click",(e)=>{
            console.log("edit",);
            tr= e.target.parentNode.parentNode;
            title= tr.getElementsByTagName("td")[1].innerText;
            Note= tr.getElementsByTagName("td")[2].innerText;
            console.log(title,Note);
            titleEdit.value=title;
            noteEdit.value=title;
            snoEdit.value=e.target.id;
            console.log(e.target.id);
           
        })


    })

   Delete = document.getElementsByClassName('delete');
    Array.from(Delete).forEach((element)=>{
        element.addEventListener("click",(e)=>{
            console.log("Delete",);
            tr= e.target.parentNode.parentNode;
            title= tr.getElementsByTagName("td")[1].innerText;
            Note= tr.getElementsByTagName("td")[2].innerText;
            console.log(title,Note);
            delTitle.value=title;
            delnote.value=Note;
            delNotes.value=e.target.id;
            console.log(e.target.id);
        })


})

    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    --> </script>


</body>

</html>