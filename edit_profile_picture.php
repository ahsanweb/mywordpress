<?php require_once('dbconnection.php'); ?>
<?php if(!$_SESSION['id']){
	header('location:index.php');
	}
	$idpp=@$_SESSION['id'];
	if($_POST){
    $image_name=$_FILES['imagep']['name'];
    $imagepath="uploads/streamer/".$image_name;
    if(move_uploaded_file($_FILES["imagep"]["tmp_name"], $imagepath)){
		}
		$msg = mysqli_query($con,"UPDATE `users` SET `image`='$image_name' WHERE id='$idpp'");
		if($msg){
			header('Location:'.$mainur.'streamers.php?msgp=1');
		}else{
			//echo("Error description: " . mysqli_error($con));
			header('Location:'.$mainur.'streamers.php?msgp=2');	
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
            <label for="imagep" class="col-sm-2 control-label">New Profile Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="imagep" name="imagep">
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