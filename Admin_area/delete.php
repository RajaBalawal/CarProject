<?php 

include_once('../functions/dbconnect.php');
 

if( isset($_GET['del']) )
	{
		$id = $_GET['del'];
                $images = "Select * from carimages where Car_id = '$id'";
                $res = mysqli_query($con,$images);
		while ($row = mysqli_fetch_assoc($res)) {
                 $url = $row["FilePath"] . "" . $row["FileName"];
                 
                 unlink($url);
                }
                $sql= "DELETE FROM cars WHERE CarId='$id'";
                
		$res= mysqli_query($con,$sql) or die("Failed".mysqli_error($con));
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}


?>