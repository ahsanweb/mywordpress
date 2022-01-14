<?php
define('DB_SERVER','localhost');
define('DB_USER','creativeweb_streamers');
define('DB_PASS' ,'S39N5Iinem');
define('DB_NAME', 'creativeweb_streamers');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$mainurl ="https://creativetech.design/demos/streamers/";

session_start();
?>