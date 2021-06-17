<?php
   $login = false;
   $error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
include 'config.php';

$code = $_POST["username"];
$pass = $_POST["password"];

$sql = "Select * from adminn where code = '$code'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num == 1){
  while($row = mysqli_fetch_assoc($result)){
    if($pass == $row['pass']){
      echo $pass;
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $code;
    header("location: /Portfolio/admin/welcome.php");
  }
  else {
    $error = "invalid Credentials";
  }
}

}
else {
  $error = "invalid Credentials";
}
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

    <title>Login!</title>
  </head>
  <body>
    <?php
    require 'partials/nav.php';  ?>

    <?php
    if ($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your are LogIn.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  
}
if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $error . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  
}
    ?>
   
    <h1 class="text-center">Welcome</h1>
    <div class="container">
      <h3 class="text-center">Login Here</h3>
     <form action="http://localhost/Portfolio/admin/login.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Enter Username</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button  type="submit" class="btn btn-primary" > Log In </button>
</form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>