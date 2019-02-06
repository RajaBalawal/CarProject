<?php 
include'functions/functions.php';
// Check to see the URL variable is set and that it exists in the database
include "functions/dbconnect.php"; 
 
if (!isset($_GET['car_id']) || empty($_GET['car_id']) || !is_numeric($_GET['car_id'])) {
    $errors[] = 'Error No Car Please Select a Car';
} else {
     $CarId = mysqli_real_escape_string($con,$_GET['car_id']);

    /*
     * Get the product details.
     */
    $sql = "SELECT * FROM cars WHERE Carid = '$CarId'";
    
    $result = mysqli_query($con, $sql);
   $Cars = mysqli_num_rows($result);
 
  
   
    if (!$Cars) {
        $errors[] = 'No Car Found.';
    } else {
        
        while($car = mysqli_fetch_array($result)){
        
       
        $car_make = $car['Make'];
        $car_model = $car['Model'];
        $car_price = $car['Price'];
        $car_desc = $car['CarDesc'];
        $car_engine = $car['EngineSize'];
        $car_milage = $car['CarMilage'];
        $car_fuel = $car['Fuel'];
        $car_year = $car['CarYear'];
        $car_tax = $car['TAX'];
        $car_transmission = $car ['Transmission'];
        $car_reg = $car['CarReg']; 
        $time = date("d/m/y", strtotime($date_added = $car['date_added']));
        
                  ?>  
<!DOCTYPE html><html lang="en">

  <head>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barros-Cars</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.1/css/swiper.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.1/css/swiper.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.1/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.1/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.1/js/swiper.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.1/js/swiper.esm.bundle.js"></script>
    
   
    <link rel="stylesheet" href="dist/css/swiper.min.css">
</head>
    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
<style>
       img {width:100%;}
 .mw30-text {max-height: 30px; overflow: hidden;}
.mh200-text {
min-height: 200px;
max-height:200px;
overflow: hidden;
}
  /*******************
  SWIPPER 
  ********************/
  .swiper-container {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
    .gallery-top {
      height: 80%;
      width: 100%;
    }
    .gallery-thumbs {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-active {
      opacity: 1;
    }


      
      
  </style>
  
  </head>
  

  <body>

    <?php 
    include 'navbar.php';
    ?>
      
<div class="container">
	<div class="row">
		<div class="col-md-8">
		   <div class="product-heading">
                       <h2><?php echo $car_make." ".$car_model; ?> £<?php echo $car_price ?></h2>
		    
		    <ul class="list-unstyled list-inline">
		        <li class="list-inline-item">  <?php echo $car_reg; ?></li>
		        <li class="list-inline-item"> | </li>
		        <li class="list-inline-item">   Second Owner </li>
		        <li class="list-inline-item"> | </li>
		        <li class="list-inline-item">  36 Views  </li>
		         <li class="list-inline-item"> | </li>
		        <li class="list-inline-item"> 1959661 Used Car ID  </li>
                        <li class="list-inline-item"> | </li>
		        <li class="list-inline-item"> Date Added <?php echo $time ?> </li>
		    </ul>
		   </div>
		   <div class="cars-gallery">
		       <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
    
   
               <?php
  
  $query = "SELECT * FROM carimages WHERE Car_id = '$CarId'";

  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $url = $row["FilePath"] . "" . $row["FileName"];
          
         $carimages = 
                             "<div class='swiper-slide'>
                               <div class='swiper-zoom-container'>
                                  <image src='Admin_area/$url'/>
                               </div>
                             </div>
      ";
         echo $carimages;
          ?>
          <?php
      }
  } else {
      ?>
      <p>There are no images uploaded to display.</p>
      
      <?php
  }
 
   
  ?>
        
    
      
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
 <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
        <?php
  
  $query = "SELECT * FROM carimages WHERE Car_id = '$CarId'";

  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $url = $row["FilePath"] . "" . $row["FileName"];
          
         $carimages = 
                             "<div class='swiper-slide'>
                               <div class='swiper-zoom-container'>
                                  <image src='Admin_area/$url'/>
                               </div>
                             </div>
      ";
         echo $carimages;
          ?>
          <?php
      }
  } else {
      ?>
      <p>There are no images uploaded to display.</p>
      
      <?php
  }
 
   $con->close();
  ?>  </div>
                   </div>
                   </div>
                    <div id="Specs">
		       <div class="row">
		           <div class="col-md-12 card-header">
                               <h4>Top Specs & Features</h4>
		               
		           </div>
		       </div>
		       <div class="row pt-2">
		           <div class="col-md-4">
		               <ul class="list-inline list-unstyled">
		                   <li class="list-inline-item "> <i class="fa fa-road pr-1"></i>Car Milage :</li>
		                   <li class="list-inline-item"> <?php echo $car_milage;?>m</li>
		               </ul>
		           </div>
		           <div class="col-md-4">
		               <ul class="list-inline list-unstyled">
		                   <li class="list-inline-item "> <i class="fa fa-calendar-o pr-1"></i> Year :</li>
		                   <li class="list-inline-item"> <?php echo $car_year;?></li>
		               </ul>
		           </div>
		           <div class="col-md-4">
		               <ul class="list-inline list-unstyled">
		                   <li class="list-inline-item "> <i class="fa fa-car pr-1"></i> Fuel Type :</li>
		                   <li class="list-inline-item"> <?php echo $car_fuel;?></li>
		               </ul>
		           </div>
		           <div class="col-md-4">
		               <ul class="list-inline list-unstyled">
		                   <li class="list-inline-item "> <i class="fa fa-road pr-1"></i> Transmission :</li>
		                   <li class="list-inline-item"><?php echo $car_transmission; ?></li>
		               </ul>
		           </div>
		           <div class="col-md-4">
		               <ul class="list-inline list-unstyled">
		                   <li class="list-inline-item "> <i class="fa fa-calendar-o pr-1"></i> Tax :</li>
		                   <li class="list-inline-item"> £<?php echo $car_tax;?></li>
		               </ul>
		           </div>
		           <div class="col-md-4">
		               <ul class="list-inline list-unstyled">
		                   <li class="list-inline-item "> <i class="fa fa-car pr-1"></i> Engine Size :</li>
		                   <li class="list-inline-item"><?php echo $car_engine; ?>l</li>
		               </ul>
		           </div>
		           
		       </div>
		   </div>
		  
		   <div class="cars-details   bg-warning border mt-2">
		        <div id="accordion">
                            <div id="CarDesc">
                            <div  class="card">
                                <div class="card-header text-white" style="background-color: grey;">
        <a  class="card-link text-white" data-toggle="collapse" href="#collapseOne">
        Specifications      </a>
    </div>
    <div id="collapseOne" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        <p><?php echo $car_desc; ?></p>
      </div>
    </div>
  </div>
                            </div>
  

  

</div> 
		   </div>
		   
		</div>
		<?php include 'Message.php'; ?>
	</div>
</div>

<?php include'Similarcars.php';?>

   
   <?php
    
   include 'footer.php';
   
   ?>
     
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/swiper.min.js"></script>
    <script type="text/javascript">
   var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      centeredSlides: true,
      slidesPerView: 'auto',
      touchRatio: 0.2,
      slideToClickedSlide: true,
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
   
  </script>
    </body>

</html>

  
<?php 
    }
}
}
?>
<?php
            if (isset($errors)) {
                echo implode('<br/>', $errors);
                exit();
            }

          ?>  

