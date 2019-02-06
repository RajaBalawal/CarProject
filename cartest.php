<?php
$dbHost = "localhost";
$dbUser = "barrosca_user";
$dbPass = "123456";
$dbName = "barrosca_car";

$pdo = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
if (strpos($pdo->getAttribute(PDO::ATTR_CLIENT_VERSION), 'mysqlnd') !== false) {
    echo '- PDO MySQLnd <b>is enabled</b>.<br>';
} else {
    echo '- PDO MySQLnd <b>is not enabled</b>.<br>';
}


if (function_exists('mysql_connect')) {
    echo "- MySQL <b>is installed</b>.<br>";
} else  {
    echo "- MySQL <b>is not</b> installed.<br>";
}

if (function_exists('mysqli_connect')) {
    echo "- MySQLi <b>is installed</b>.<br>";
} else {
    echo "- MySQLi <b>is not installed</b>.<br>";
}

if (function_exists('mysqli_get_client_stats')) {
    echo "- MySQLnd driver is being used.<br>";
} else {
    echo "- libmysqlclient driver is being used.<br>";
}


$CarId = $_GET['car_id'];
    
    /*
     * Get the product details.
     */
    $sql = 'SELECT * 
            FROM cars 
            WHERE Carid = ? 
            LIMIT 1';

    $statement = $pdo->prepare($sql);

    $statement->bind_param('i', $CarId);

    $statement->execute();

    /*
     * Get the result set from the prepared statement.
     * 
     * NOTA BENE:
     * Available only with mysqlnd ("MySQL Native Driver")! If this 
     * is not installed, then uncomment "extension=php_mysqli_mysqlnd.dll" in 
     * PHP config file (php.ini) and restart web server (I assume Apache) and 
     * mysql service. Or use the following functions instead:
     * mysqli_stmt::store_result + mysqli_stmt::bind_result + mysqli_stmt::fetch.
     * 
     * @link http://php.net/manual/en/mysqli-stmt.get-result.php
     * @link https://stackoverflow.com/questions/8321096/call-to-undefined-method-mysqli-stmtget-result
     */
    
    $result = $statement->get_result();
    
    /*
     * Fetch data (all at once) and save it into an array.
     * 
     * @link http://php.net/manual/en/mysqli-result.fetch-all.php
     */
    $Cars = $result->fetch_all(MYSQLI_ASSOC);

    /*
     * Free the memory associated with the result. You should 
     * always free your result when it is not needed anymore.
     * 
     * @link http://php.net/manual/en/mysqli-result.free.php
     */
    $result->close();

    $statement->close();