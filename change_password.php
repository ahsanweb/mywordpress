<?php require_once('dbconnection.php'); ?>
<?php if(!$_SESSION['id']){
	header('location:index.php');
	}
	$idpp=@$_SESSION['id'];
	if($_POST){
		$passwordold 		= $_POST['passwordold'];
		$passwordnew 		= $_POST['passwordnew'];
		$changepasssql = mysqli_query($con,"select * from users where password='".$passwordold."' AND id='$idpp'");
	   $changepasssqlrow = mysqli_num_rows($changepasssql);
	if($changepasssqlrow>0){
		
		$msg = mysqli_query($con,"UPDATE `users` SET `password`='$passwordnew' WHERE id='$idpp'");
		if($msg){
			header('Location:'.$mainur.'streamers.php?msgpass=1');
		}else{
			//echo("Error description: " . mysqli_error($con));
			header('Location:'.$mainur.'streamers.php?msgpass=2');	
		}
		
		}else{
			header('Location:'.$mainur.'streamers.php?msgpass=2');	
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
      <?php include('inc/tabs_streamer.php');?>
        <div class="tab-content col-lg-10">
          <div class="tab-pane active" id="home">
            <div class="">
             
         <form class="form-horizontal" name="registration" method="post" enctype="multipart/form-data" action="" id="registration">
         <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Old Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="passwordold" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="passwordnew" placeholder="Password">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="signup" class="btn btn-default">Update</button>
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
$(".1sttab").addClass("active");
});
</script>
  <?php include('inc/footer.php');?>