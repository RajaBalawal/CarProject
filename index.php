<?php 
include'functions/functions.php';
include 'functions/dbconnect.php';
@$cat=$_GET['cat'];
 ?>





<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barros-Cars</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
<SCRIPT language=JavaScript>

function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index.php?cat=' + val ;
}


</script>
  </head>
  <style>
      .jumbotron{
    color: white;
    font-weight: bold;
     background-size: cover;
     border: 1px solid black;
    padding: 25px;
    background: url("Images/jumptron.jpg");
    background-size: auto;
  
      }
      
      
  </style>
  <body>

    <?php 
     include 'navbar.php';
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
          <h1 class="display-4"><bold>BARROS-CARS</bold></h1>
          <p class="lead"><bold>We Have Reliable Cheap Cars Availiable For You To Buy</bold></p>
         <?Php

            
            $SelectMake = "SELECT DISTINCT Make FROM cars";
            
      echo"      <form method='get' name='f1' class='form-group' id='dropdown' action='view.php' >
                  <div class='row'>
                      <div class='col-sm-4' >
                     <select class='form-control' name='cat' onchange=\"reload(this.form)\" ><option value=''>Make</option>";
                        if($stmt = $con->query("$SelectMake")){
                            while($row2 = $stmt->fetch_assoc()){
                         if($row2['Make'] == @$cat){
                             echo "<option selected value'$row2[Make]'>$row2[Make]</option>";
                         }else{
                            echo  "<option value'$row2[Make]'>$row2[Make]</option>";
                         }           
                            }
                        }else{
                            echo $con->error;
                        }
                   echo " </select>";
        echo               "  </div>
                   </div>
                        <br>
           <div class='row'>
             <div class='col-sm-4'>";
                echo "<select class='form-control' name='subcat'><option value=''>Model</option>";
            if (isset($cat) and strlen($cat) > 0) {
                if ($stmt = $con->prepare("SELECT Distinct Model from cars where Make = ? ")) {
                    $stmt->bind_param('s',$cat);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row1 = $result->fetch_assoc()) {
                        echo "<option value='$row1[Model]'>$row1[Model]</option>";
                    }
                } else {
                    echo $conn->error;
                }

/////////
            } else {
///////
                $query = "SELECT Make,Model FROM cars ";

                if ($stmt = $con->query("$query")) {
                    while ($row1 = $stmt->fetch_assoc()) {

                        echo "<option value='$row1[Make]'>$row1[Model]</option>";
                    }
                } else {
                    echo $conn->error;
                }
            }
                 echo  " </select>
                     <br>
                     <select class='form-control' name='range'>
                     <option value='500' >£500</option>
                     <option value='1000' >£1000</option>
                     <option value='1500' >£1500</option>
                     <option value='2000' >£2000</option>
                     <option value='2500' >£2500</option>
                     </select>
                         </div>
                        </div>
                        <br>
                        <button type='submit' class='btn btn-primary btn-md'>Search</button>
                            
                    </form>
                    ";
                    ?>
            
      </header>

      <!-- Page Features -->
      <div class="row text center">
         <div class="container">
 
             <h1 class="display-4" align="center">Our Newly Added Cars </h1>
            
</div>     
      </div>
      <div class="row text-center">

        <?php 
         getCars();
        ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php 
    include 'footer.php';
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
