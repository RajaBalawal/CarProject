<?php
  require('dbconnect.php');

 session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
    
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    
  //Checking is user existing in the database or not
    $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
     error_reporting(E_ALL);
      $_SESSION['username'] = $username;  
      header("Location:index.php");
        exit();
        ?>
 <?php
            }else{
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>


<body class="bg-dark">
 
            
<div class='modal-fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Sorry Wrong Username or Password</h5>
            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>×</span>
            </button>
          </div>
          <div class='modal-body'>Please try again</div>
          <div class='modal-footer'>
            <a class='btn btn-secondary' type='button' data-dismiss='modal'href='../index.php'>Home</a>
            <a class='btn btn-primary' href='login.php'>Try Again</a>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
    }else{
?>
    <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
          <form action="" method="post" name="login" >
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username" placeholder="Username">
          </div> 
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
              <input class="form-control" name="submit" id="submit" type="submit" value="Login" />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <?php  } ?>
</body>

</html>

