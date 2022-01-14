<?php 
require_once('dbconnection.php');
$email = $_POST['email'];
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
	if($row>0){
		echo 'false';
	}else{
	    
	    echo 'true';
	}
	
?>	
		
	