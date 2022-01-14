<?php 
require_once('dbconnection.php');
$uname = $_POST['uname'];
$sql=mysqli_query($con,"select id from admin where username='$uname'");
$row=mysqli_num_rows($sql);
	if($row>0){
		echo 'false';
	}else{
	    
	    echo 'true';
	}
	
?>	
		
	