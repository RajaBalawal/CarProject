<?php 
require('dbconnect.php');
include("auth.php"); 
require("../functions/functions.php")

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Barros-Cars Admin Panel</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Admin Panel <?php echo $_SESSION["username"]; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="AddCar.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Add Car</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Car</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <div align="center" class="display-1">
           <h1>ADD CAR</h1>
          </div>
         <form action="upload.php" id="CarAdd" method="post" enctype="multipart/form-data">

  <div class="form-group"> <!-- Make -->
    <label for="full_name_id" class="control-label">Make</label>
    <input type="text" class="form-control" id="CarMake" name="CarMake" placeholder="Car Make" required="">
  </div>  

  <div class="form-group"> <!-- Model -->
    <label for="street1_id" class="control-label">Model</label>
    <input type="text" class="form-control" id="CarModel" name="CarModel" placeholder="Car Model">
  </div>          
              
  <div class="form-group"> <!-- Car Registration -->
    <label for="street1_id" class="control-label">Registration</label>
    <input type="text" class="form-control" id="CarReg" name="CarReg" placeholder="Car Registration">
  </div> 

  <div class="form-group"> <!-- Description  -->
    <label for="street1_id" class="control-label">Description</label>
    <textarea class="form-control" name="CarDesc" id="CarDesc" placeholder="Description" rows="3"></textarea>
  </div>                  
              
  <div class="form-group"> <!-- Fuel Type -->
    <label for="state_id" class="control-label">Fuel</label>
    <select class="form-control" id="Fuel" name="Fuel">
      <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Hybird">Hybird</option>
             <option value="Other">Other</option>
    </select>         
  </div>
             <div class="form-group"> <!-- Transmission -->
    <label for="state_id" class="control-label">Transmission</label>
    <select class="form-control" id="Transmission" name="Transmission">
      <option value="Automatic">Automatic</option>
            <option value="Manual">Manual</option>
            <option value="Semi-Automatic">Semi-Automatic</option>
             <option value="Other">Other</option>
    </select>         
  </div>

  <div class="form-group"> <!-- Car Year -->
    <label for="street1_id" class="control-label">Year</label>
    <input type="text" class="form-control" id="CarYear" name="CarYear" placeholder="Car Year">
  </div> 

  <div class="form-group"> <!-- Engine Size -->
    <label for="street1_id" class="control-label">Engine Size</label>
    <input type="text" class="form-control" id="EngineSize" name="EngineSize" placeholder="Engine Size">
  </div> 
  
  <div class="form-group"> <!-- Car Milage -->
    <label for="street1_id" class="control-label">Milage</label>
    <input type="text" class="form-control" id="CarMilage" name="CarMilage" placeholder="Car Milage">
  </div>    

  <div class="form-group"> <!-- Car Tax -->
    <label for="street1_id" class="control-label">Tax</label>
    <input type="text" class="form-control" id="CarTax" name="CarTax" placeholder="Annual Tax">
  </div> 

  <div class="form-group"> <!-- PRice -->
    <label for="street1_id" class="control-label">Price</label>
    <input type="text" class="form-control" id="Price" name="Price" placeholder="£ Price">
  </div> 

  <div class="file-field">
        <div class="btn btn-primary btn-sm float-left">
            <span>Choose files</span>
            <input name="files[]" id="files" type="file" multiple/>
        </div>
    </div>
             <div align="center">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ADD CAR
</button>
             </div>
  <!-- Success Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Saving Car Into Database</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Add Car by Pressing Save Changes 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="hidden" name="CarId" id="CarId"</input>
       <button name="insertcar" id="insertcar" class="btn btn-primary" data-target="#SuccessCar">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>  
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Barros-Cars</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->  
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>





