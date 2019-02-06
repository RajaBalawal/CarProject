<?php
include 'auth.php'; 
require 'dbconnect.php';
 
    if(isset($_POST['insertcar'])){

        // Getting data from the fields
    
      $car_make = mysqli_escape_string($con,$_POST['CarMake']);
      $car_model = mysqli_escape_string($con,$_POST['CarModel']);
     $car_reg = mysqli_escape_string($con,$_POST['CarReg']);
      $car_desc = mysqli_escape_string($con,$_POST['CarDesc']);
      $car_engine = mysqli_escape_string($con,$_POST['EngineSize']);
     $car_fuel = mysqli_escape_string($con,$_POST['Fuel']);
     $car_milage = mysqli_escape_string($con,$_POST['CarMilage']);
     $car_price = mysqli_escape_string($con,$_POST['Price']);
    $car_year = mysqli_escape_string($con,$_POST['CarYear']);
    $car_tax = mysqli_escape_string($con,$_POST['CarTax']);
    $car_transmission = mysqli_escape_string($con,$_POST['Transmission']);
     // sending the data to the database
     $insertauto = 'Insert into cars (Make,Model,EngineSize,CarReg,CarDesc,Fuel,Transmission,CarMilage,Price,CarYear,TAX,date_added)Values(?,?,?,?,?,?,?,?,?,?,?,now())';
      
     $statement = $con->prepare($insertauto); 
     $statement->bind_param('sssssssiiii',$car_make,$car_model,$car_engine,$car_reg,$car_desc,$car_fuel,$car_transmission,$car_milage,$car_price,$car_year,$car_tax);
    $statement->execute();
    $lastInsertId = $con->insert_id;
    $statement->close();
    
    $errors = array();
    $extension = array("jpeg","jpg","png","gif");
    
    $bytes = 100024;
    $allowedKB = 10000;
    $totalBytes = $allowedKB * $bytes;
    
    if(isset($_FILES["files"])==false)
    {
      echo "<b>Please, Select the files to upload!!!</b>";
      return;
    }
    
     foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
    {
      $uploadThisFile = true;
      
      $file_name=$_FILES["files"]["name"][$key];
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
      
      $ext=pathinfo($file_name,PATHINFO_EXTENSION);

      if(!in_array(strtolower($ext),$extension))
      {
        array_push($errors, "File type is invalid. Name:- ".$file_name);
        $uploadThisFile = false;
      }       
      
      if($_FILES["files"]["size"][$key] > $totalBytes){
        array_push($errors, "File size must be less than 1000KB. Name:- ".$file_name);
        $uploadThisFile = false;
      }
      
      if(file_exists("car_images/".$_FILES["files"]["name"][$key]))
      {
        array_push($errors, "File is already exist. Name:- ". $file_name);
        $uploadThisFile = false;
      }
      
      if($uploadThisFile){
        $filename=basename($file_name,$ext);
        $newFileName=$filename.$ext;   
        $path = 'car_images/';
        move_uploaded_file($_FILES["files"]["tmp_name"][$key],$path.$newFileName); 
        
        //$query = "INSERT INTO carimages (ID,Car_id,FilePath, FileName) VALUES('','','car_images','".$newFileName."')";
           
        $insertPics = 'Insert into carimages (Car_id,FileName,FilePath)Values(?,?,?)';
        $statement = $con->prepare($insertPics);
        
        $statement->bind_param('iss',$lastInsertId,$newFileName,$path);
        
        $statement->execute();
        
        $statement->close();
    
      } 
      
    }
     echo'<h1>Successfully Added</h1>';
     echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }else{
        echo'<h1 align="center">Error Try again</h1>';
    }
    
      
    
    
    
    
    

?>
  
      
     
      
 

 