

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
   
    <title>easyNote!</title>
</script>  
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">easyNote</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
$server="localhost";
$database="notes";
$username="root";
$password="";
$title=$_POST['title'];
$note=$_POST['note'];

$msg=false;
$conn=mysqli_connect($server,$username,$password,$database);

$sql ="INSERT INTO `notes` (`Sno`, `Title`, `note`, `time`) VALUES (NULL, '$title', '$note', CURRENT_TIMESTAMP)";
  

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
  <center><strong>failed to update !</strong> </center>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }


}
?>


<h3 class="container mt-3"><u><center>Welcome to easyNote!</center></u> </h3>
<hr>
<div class="container mt-3" >

<h3> Add a Note!</h3>
<div class="mb-3">
<form action="curd.php" method="POST">
  <label for="exampleFormControlInput1" class="form-label">Add Title</label>
  <input type="text" class="form-control" id="title" name="title" ><br>
  <label for="exampleFormControlTextarea1" class="form-label"> Take Note</label>
  <textarea class="form-control" id="note" name="note" rows="3"></textarea><br>

  <input type="submit" class="btn btn-primary" value="Submit"></button>
  </form>
</div>
</div>
<?php
$server="localhost";
$database="notes";
$username="root";
$password="";
 $conn=mysqli_connect($server,$username,$password,$database);
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
      <td>  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button> <button type="button" class="btn btn-primary"  id="del" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></td>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div><div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </tr>
        </tbody>
      
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Note:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Changes</button>
       
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
       

</div>
     </tr>
     <?php }?>  
      <?php }?>  
      </tbody>
      </table>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
    </script>
    



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>