<?php require_once('dbconnection.php'); ?>
<?php if($_SESSION['usertype'] != "agent"){
	header('location:index.php');
	
	 }
if($_POST){
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$contact 		= $_POST['contact'];
	$usertype 		= $_POST['usertype'];
	$bio 			= $_POST['bio'];
	$agent_id 		= $_SESSION['id'];
	$nickname 			= $_POST['nickname'];
	$enc_password 	= md5($password);
	$sql = mysqli_query($con,"select id from users where email='$email'");
	$row = mysqli_num_rows($sql);
	
	$sqlnicknamw = mysqli_query($con,"select id from users where nickname='$nickname'");
	$rownicxk = mysqli_num_rows($sqlnicknamw);
	if($rownicxk>0){
		echo "<script>alert('Nick Name id already exist with another account. Please try with other Nick Name');</script>";
	}
	else{
	if($row>0){
		echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
	}else{
		$msg = mysqli_query($con,"insert into users(fname,lname,email,password,contactno,usertype, bio, agent_id,check_first_login,nickname) values('$fname','$lname','$email','$enc_password','$contact','$usertype', '$bio', '$agent_id', '0', '$nickname')");
		if($msg){
			header('Location:'.$mainurl.'add_new_steamer.php?msg=1');
		}
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

    <title>Home</title>
	<?php include('inc/header.php');?>

    <div class="container">
    <div class="row">
		<div class="col-xs-12">
		  
				<?php include('inc/tabs.php');?>
				<div class="tab-content col-lg-10">
					<div class="tab-pane active" id="about">                
						<div class="">
                        <h2>Welcome to add new Streamer</h2>
                        <div class="spacer30"></div>
						  <?php if($_GET['msg'] == 1){ ?>
                          <div class="alert alert-success alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Successfully register.
                          </div>
                          <div class="spacer30"></div>
                          <?php } ?>
                          <form class="form-horizontal" name="registration" method="post" action="" id="registration">
                                <input type="hidden" value="streamer" name="usertype" />
                              <div class="form-group">
                              <label for="nickname" class="col-sm-2 control-label">Nick Name</label>
                               <div class="col-sm-10">
                                   <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nick Name">
                                    </div>
                         </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" required>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" name="signup" class="btn btn-default">Register</button>
                                </div>
                              </div>
                            </form>         
						</div>
					</div> 
					
				</div>
			</div>
			<!-- /tabs -->
		</div>
	</div>
    

      

      <hr>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script>
$( document ).ready(function() {
$(".tbsnaves").removeClass("active");
$(".2sttab").addClass("active");
});
</script>
     <?php include('inc/footer.php');?>