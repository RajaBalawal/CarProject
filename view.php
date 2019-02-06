<?php 
include'functions/functions.php';
include 'functions/dbconnect.php';

if(!isset($_GET['cat']) || empty($_GET['cat']) || !isset($_GET['subcat']) || empty($_GET['subcat']) ){
	
	echo('<div class="alert alert-danger" role="alert" align="center">
  <strong>ERROR</strong> PLEASE SELECT A CAR
</div>');
}else{
	$CarMake = $_GET['cat'];
	$CarModel = $_GET['subcat'];
        $PriceRange = $_GET ['range'];
	//$nquery=mysqli_query($con,"SELECT * FROM cars where Make ='$CarMake' and Model = '$CarModel' and Price <= '$PriceRange' ");
        
       
        
        $nquery = "Select * from cars where Make = ? and Model = ? and Price <= ?";
        $stmt = $con->prepare($nquery);
        $stmt->bind_param("ssi",$CarMake,$CarModel,$PriceRange);   
        $stmt->execute();
	$nquery = $stmt->fetch_assoc(); 
        if($nquery->num_rows === 0)
             {
        echo('<div class="alert alert-danger" role="alert" align="center">
            <strong>ERROR</strong> NO CARS AVAILIBLE 
                </div>');
             }
          
        
        }
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
    
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
<script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script> 
    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <style>
        .view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
}
.item.list-group-item .img-event {
    float: left;
    width: 30%;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
}
.item.list-group-item .caption
{
    float: left;
    width: 70%;
    margin: 0;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
    clear: both;
}
    </style>

  </head>
 <SCRIPT language=JavaScript>
$(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
            
        });



</script>
  <body>

    <?php 
     include 'navbar.php';
    ?>

    <!-- Page Content -->
   
    
 <div class="container">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
                <div class="btn-group">
                    <button class="btn btn-info" id="list">
                        List View
                    </button>
                    <button class="btn btn-danger" id="grid">
                        Grid View
                    </button>
                </div>
            </div>
        </div>
    </div> 
     <button id="asc">sort by price asd</button>
    <div id="products" class="grid-group-item">
 <?php
echo $PriceRange;

			while($crow = mysqli_fetch_array($nquery)){
                       $car_id = $crow ['CarId'];
                      $car_price = $crow ['Price'];
                     $car_desc = $crow['CarDesc'];
                        $imgCar = mysqli_query($con,"SELECT * FROM carimages WHERE Car_id = '$car_id' LIMIT 1");
                        while($row = mysqli_fetch_array($imgCar)){
                            $url = $row["FilePath"] . "" . $row["FileName"];
                        
			?>
    
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <a href="car.php?car_id=<?php echo $car_id;?>">
                        <div class="img-event">
                           <img src="Admin_area/<?php echo $url; ?>" class="group list-group-image img-fluid" widht="250" height="100" />
                        </div></a>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                <?php echo $CarMake." ".$CarModel ?></h4>
                            <p class="group inner list-group-item-text">
                                <?php echo $car_desc; ?></p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        £<?php echo $car_price ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success">View</a>
                                </div>
                            </div>
                        </div>
                   </div>
                       </div> 
     
    
			<?php 
                        }
                        }
                        ?>
   
    </div>        
  </div>
    

 
    <!-- /.container -->
    


    <?php 
    include 'footer.php';
    ?>
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        
        
        </script>
  </body>

</html>
