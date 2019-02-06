<?php 

// Check to see the URL variable is set and that it exists in the database
include "functions/dbconnect.php"; 

$Make = mysqli_real_escape_string($con,$_GET['Make']);

    /*
     * Get the product details.
     */
    $sql = "SELECT * FROM cars Where Make = '$Make'";
    
    $result = mysqli_query($con, $sql);
    
    while($SameMake = mysqli_fetch_array($result)){
        
      $car_make = $SameMake ['Make'];  
        
        
    }

?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h3> Find Similar Products</h3>
            <p>Listopia - Directory, Community  Theme</p>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
             <div class="row">
		<div class="col-md-12">
		     <div class="row py-2">
		        <div class="col-md-3 vertical-box">
		             <div class="card">
                      <img class="card-img-top mh200-text" src="https://img2.gaadicdn.com/images/usedcarimages/320x224/11-2017/1843403/IMG_6603.jpg" alt="Card image">
                      <div class="card-body">
                        <h4 class="card-title mw30-text"><?php echo $car_make; ?></h4>
                    <h5 class="card-text">Rs. 25.32 Lac*</h5>
    
    <ul class="list-inline">
                            <li class="list-inline-item">44,114 Km</li>
                             <li class="list-inline-item">Petrol</li>
                             <li class="list-inline-item">Gurugram</li>
                        </ul>
                        <button type="button" class="btn btn-outline-danger">Contact Sellers</button>
  </div>
</div>
		         </div>
		       
        </div>
    </div>
</div>
        </div>
    </div>
</div>
