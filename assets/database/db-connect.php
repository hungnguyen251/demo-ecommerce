<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "ecommerce";
$conn = mysqli_connect($host,$username,$password,$database);
// $mysqlQuery = mysqli_query($conn,"SET NAMES 'utf8'");

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function getData($data) {
    return mysqli_fetch_array($data, MYSQLI_ASSOC);
}
?>