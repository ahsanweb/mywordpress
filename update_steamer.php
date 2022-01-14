<?php require_once('dbconnection.php'); ?>
<?php if($_SESSION['usertype'] != "agent"){
	header('location:index.php');
	
	 }
	 if($_POST){
	
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	
	$uid=intval($_GET['uid']);
	$enc_password 	= md5($password);
	if(!empty($password)){
		
		$msg = mysqli_query($con,"update users set email='$email' , password='$enc_password'   where id='$uid'");
		
		}else{
		$msg = mysqli_query($con,"update users set email='$email' where id='$uid'");
		}
		if($msg){
			$_SESSION['msg']="Updated successfully";
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
      <?php if($_SESSION['msg'] != ''){ ?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          Update Successfully.
      </div>
      <div class="spacer30"></div>
      <?php } ?>
      
       <?php $ret=mysqli_query($con,"select * from users where id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <form class="form-horizontal" name="registration" method="post" action="" id="">
      		<input type="hidden" value="streamer" name="usertype" />
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $row['email'];?>" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="signup" class="btn btn-default">Update</button>
            </div>
          </div>
        </form>  
        <?php }?>       
						</div>
					</div> 
					
				
					
				
					
				</div>
			</div>
			<!-- /tabs -->
		</div>
	</div>
    

      

      <hr>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <?php 
	 $_SESSION['msg']='';
	 include('inc/footer.php');?>