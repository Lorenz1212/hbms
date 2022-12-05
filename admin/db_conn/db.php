<?php
/* Connect to a MySQL database using driver invocation */
$connection_string = 'mysql:dbname=hbmsdb;host=localhost';
$db_username = 'root';
$db_password = '';

// $connection_string = 'mysql:dbname=fdc_mng_db;host=localhost;port=3307';
// $db_username = 'fdctms';
// $db_password = 'p+7hXX!H_yFH';

try
{
    $conn = new PDO($connection_string, $db_username, $db_password);
    // echo "Connection Success";
}
catch (PDOException $e)
{
    echo 'Connection failed: ' . $e->getMessage();
}
?>
