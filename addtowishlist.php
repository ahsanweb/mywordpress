<?php
require_once('dbconnection.php');
$strea_id = $_POST['strea_id'];
$del = $_POST['del'];
$ssid=$_SESSION['id'];
if($del=="yes"){
	
	$sqldel = "DELETE FROM user_wishlist where whish_listed_user='$strea_id' AND user_id='$ssid'";
   if($con->query($sqldel)){}
	
	echo '0';
	}else{

 $msg = mysqli_query($con,"insert into user_wishlist(user_id,whish_listed_user) values('$ssid','$strea_id')");
echo '1'; }
?>