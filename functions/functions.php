<?php 

include 'dbconnect.php';

//getting the users data into the adminpage

function getAdmin(){

  global $con;

  $get_admin = "SELECT * FROM users";

  $run_admin = mysqli_query($con,$get_admin);

  while ($row_admin = mysqli_fetch_array($run_admin)) {
    
    $admin_username = $row_admin['username'];

    echo $admin_username;
  }
  

}


//getting the cars on the main page
function listCars(){

global $con;
 $get_cars = "SELECT * from cars";

 $run_cars = mysqli_query($con,$get_cars);

 while ($row_cars = mysqli_fetch_array($run_cars)) {

 	$car_id = $row_cars['CarId'];
 	$car_make = $row_cars['Make'];
 	$car_model = $row_cars['Model'];
 	$car_year = $row_cars['CarYear'];
 	$car_fuel = $row_cars['Fuel'];
 	$car_price = $row_cars['Price'];
 	$car_reg = $row_cars['CarReg'];
 	$car_engine = $row_cars['EngineSize'];
 	$date = $row_cars['date_added'];
 
	echo "<tbody>
                <tr>
                  <td>$car_make</td>
                  <td>$car_model</td>
                  <td>$car_engine</td>
                  <td>$car_fuel</td>
                  <td>$car_year</td>
                  <td>$car_reg</td>
                  <td>£$car_price</td>
                  <td>$date</td>
                  <td><a href='delete.php?del=$row_cars[CarId]'>Delete</a></td>
                      <td><a href='Edit.php?edit=$row_cars[CarId]'>Edit</a></td>
               </tr>
               </tbody>";




}
}

function getCars(){

	global $con;
 $get_cars = "SELECT * from cars";

 $run_cars = mysqli_query($con,$get_cars);

 while ($row_cars = mysqli_fetch_array($run_cars)) {

 	$car_id = $row_cars['CarId'];
 	$car_make = $row_cars['Make'];
 	$car_model = $row_cars['Model'];
 	$car_price = $row_cars['Price'];
        $car_desc = $row_cars['CarDesc'];

       
 $query = "SELECT * FROM carimages WHERE Car_id = '$car_id' LIMIT 1";
  $result = mysqli_query($con, $query);

      while ($row = mysqli_fetch_assoc($result)) {
          $url = $row["FilePath"] . "" . $row["FileName"];
     $image = "<img src='Admin_area/$url' class='card-img-top' style='width:100%' alt='Image'>";
      }
 	echo " 


<div class='col-lg-3 col-md-6 mb-4'>
          <div class='card'>
            $image
            <div class='card-body'>
              <h4 class='card-title'>$car_make $car_model</h4>
              <h3 class='card-title'>£$car_price</h3>
            </div>
            <div class='card-footer'>
              <a href='car.php?car_id=$car_id' class='btn btn-primary'>More Details</a>
            </div>
          </div>
        </div>
                

        "
        ;

}
}

function carsCount(){
    
   global $con;
    $result = mysqli_query($con,"SELECT * FROM cars");
     $num_rows = mysqli_num_rows($result);

        echo "$num_rows Cars added";
}






?>


