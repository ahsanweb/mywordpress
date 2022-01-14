<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if($_POST){
	$fname 			= $_POST['fname'];
	$lname 			= $_POST['lname'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$contact 		= $_POST['contact'];
	$usertype 		= $_POST['usertype'];
	$bio 			= $_POST['bio'];
	$enc_password 	= md5($password);
	$agent_id 		= '000';
	$sql = mysqli_query($con,"select id from users where email='$email'");
	$row = mysqli_num_rows($sql);
	if($row>0){
		echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
	}else{
		$msg = mysqli_query($con,"insert into users(fname,lname,email,password,contactno,usertype, bio, agent_id,check_first_login) values('$fname','$lname','$email','$enc_password','$contact','$usertype', '$bio', '$agent_id', '0')");
		if($msg){
			header('Location:'.$mainur.'register_user.php?msg=1');
		}else{
			//echo("Error description: " . mysqli_error($con));
			header('Location:'.$mainur.'register_user.php?msg=2');
		}
	}
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/jumbotron/">

    <title>User Registration Form</title>

    <?php include('inc/header.php');?>

    <div class="container">
      <!-- Example row of columns -->
      <h1>User Registration Form</h1>
      <div class="spacer30"></div>
      <?php if($_GET['msg'] == 1){ ?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          You successfully register.
      </div>
      <div class="spacer30"></div>
      <?php } ?>
      <?php if($_GET['msg'] == 2){ ?>
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          Something went wrong.
      </div>
      <div class="spacer30"></div>
      <?php } ?>
      <form class="form-horizontal" name="registration" method="post" action="" id="registration">
      		<input type="hidden" value="viewer" name="usertype" />
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="fname" placeholder="First Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="lname" placeholder="Last Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Contact No</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="contact" placeholder="Contact No">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Bio</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputEmail3" name="bio" placeholder="Enter your Bio here..." style="height:160px"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="signup" class="btn btn-default">Register</button>
            </div>
          </div>
        </form>
		<div class="spacer30"></div>
        <div class="spacer30"></div>
      <?php include('inc/footer.php');?>