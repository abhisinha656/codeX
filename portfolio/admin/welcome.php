<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true ){
  header("location: /Portfolio/admin/login.php");
  exit;
}

?>

<?php
    require("config.php");
    $delete = false;

if(isset($_GET['delete'])){
$no = $_GET['delete'];
$delete = true;
$sql = "DELETE FROM `record` WHERE `Sno` = $no";
$result = mysqli_query($conn, $sql);
}


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title> Welcome!-<?php  echo $_SESSION['username']?></title>
    
  </head>
  
  <body>
    <?php
    require 'partials/nav.php';
    ?> 
    <div class="container">
    <h1 class ="text-center">Welcome <?php  echo $_SESSION['username']?></h1>
    </div>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>click! View</strong> to see message and email:
    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    </button>
  </div>

<!--     edit Modals -->
    <!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" roll = "document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form  method="POST">
          <input type="hidden" name="noEdit" id = "noEdit">
         <div class="form-group">
       
          <label for="title">Email</label>
          <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
        </div>
       
           <div class="form-group"> 
           <label for="text">Message</label>
           <textarea class="form-control" id="textEdit" name="textEdit" rows="3"></textarea>
           </div> 
   
    

      </div>
      <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>


 <?php
  
  if($delete){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sucess!</strong> You Record deleted Sucessfully:
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

 ?>


<div class="container">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Mob No</th>
      <!-- <th scope="col">Message</th> -->
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    

<?php

$sql = "SELECT * FROM `record`";
$result = mysqli_query($conn, $sql);
$no = 0;
while($row = mysqli_fetch_assoc($result)){
     $no = $no+1;
    echo " <tr>
      <th scope='row'>" . $no . "</th>
      <td>" .$row['fname'] . "</td>
      <td>" .$row['phone'] . "</td>
      <td style='display:none;'>" .$row['msage'] . "</td>
      <td style='display:none;'>" .$row['email'] . "</td>

      <td> <button class='edit btn btn-sn btn-primary' id=".$row['Sno'].">View</button>  <button class='delete btn btn-sn btn-primary' id=d".$row['Sno'].">Delete</button> </td>
    </tr>";
    }
    ?>
 </tbody>
</table>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <script>
   	edits = document.getElementsByClassName('edit');
   	Array.from(edits).forEach((element)=>{
   		element.addEventListener("click", (e)=>{
   			console.log("edit ",);
       tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[3].innerText;
        text = tr.getElementsByTagName('td')[2].innerText;
        console.log(title, text);
             titleEdit.value = title;
             textEdit.value = text;
             noEdit.value = e.target.id;
             console.log(e.target.id);
   		  $('#editModal').modal('toggle');
      })
   	})

       deletes = document.getElementsByClassName('delete');
       Array.from(deletes).forEach((element)=>{
       element.addEventListener("click", (e)=>{
       console.log("edit ",);
       no = e.target.id.substr(1,);

       if (confirm("Are u sure to want delete the note!")){
        console.log("yes");
        window.location = `/Portfolio/admin/welcome.php?delete=${no}`;

       }
       else{
        console.log("no");
       }
      })
    })

   </script>

   <!-- <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    	$(document).ready( function () {
    $('#myTable').DataTable();
     });
    </script> -->


  </body>
</html>