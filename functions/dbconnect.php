<?php


$servername = "localhost";
$username = "barrosca_user";
$password = "123456";
$database = "barrosca_car";


// Create connection
$con = new mysqli($servername, $username, $password,$database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>