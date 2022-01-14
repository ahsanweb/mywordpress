<?php
	session_start();
	require_once('dbconnection.php');
	$password 		= $_POST['pass'];
	$dec_password 	=md5($password);
	$useremail 		= $_POST['email'];
	$ret = mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
	$num = mysqli_fetch_array($ret);
	if($num > 0){
		$extra 					= "welcome.php";
		$_SESSION['login'] 		= $_POST['email'];
		$_SESSION['id'] 		= $num['id'];
		$_SESSION['name'] 		= $num['fname'];
		$_SESSION['usertype'] 	= $num['usertype'];
		$check_first_login		= $num['check_first_login'];
		$uid					= $num['id'];
		
		if($check_first_login == 0){
			mysqli_query($con,"update users set check_first_login = '1' where id = '$uid'");	
		}
		
		
		if($num['usertype'] == "streamer"){
			echo "1";
		}else if($num['usertype'] == "agent"){
			echo "3";	
		}else{		
			echo "2";
		}
		exit();
	}else{
		echo "0";
		exit();
	}
