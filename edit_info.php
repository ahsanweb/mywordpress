<?php require_once('dbconnection.php'); ?>
<?php if(!$_SESSION['id']){
	header('location:index.php');
	}
	$idpp=@$_SESSION['id'];
	if($_POST){
    $fname 			= $_POST['fname'];
	$lname 			= $_POST['lname'];
	$contact 		= $_POST['contact'];
	$bio 			= $_POST['bio'];
	$age 			= $_POST['age'];
	$country 			= $_POST['country'];
	$address 			= $_POST['address'];
	$gender 			= $_POST['gender'];
	$nickname 			= $_POST['nickname'];
	$zcode              = $_POST['zcode'];
	$bio 			= str_replace("'","",$bio);
	
	
	$passwordnew 		= $_POST['passwordnew'];
		$changepasssql = mysqli_query($con,"select * from users where nickname='$nickname' AND id!='".$idpp."'");
	   $changepasssqlrow = mysqli_num_rows($changepasssql);
	if($changepasssqlrow>0){
		header('Location:'.$mainur.'edit_info.php?msgnick=2');	
		}else{
			   if($passwordnew!=""){
				   $passwordnew 		= md5($passwordnew);
				    $msg = mysqli_query($con,"UPDATE `users` SET `fname`='$fname', `lname`='$lname', `contactno`='$contact', `bio`='$bio', `nickname`='$nickname', `password`='$passwordnew', `age`='$age', `country`='$country', `address`='$address', `gender`='$gender', `zcode`='$zcode' WHERE id='$idpp'");
		            if($msg){
			        header('Location:'.$mainur.'streamers.php?msgnick=1');
		            }else{
			       //echo("Error description: " . mysqli_error($con));
			       header('Location:'.$mainur.'streamers.php?msgnick=2');	
		           }
				
				}else{
			
		       	   $msg = mysqli_query($con,"UPDATE `users` SET `fname`='$fname', `lname`='$lname', `contactno`='$contact', `bio`='$bio', `nickname`='$nickname', `age`='$age', `country`='$country', `address`='$address', `gender`='$gender', `zcode`='$zcode' WHERE id='$idpp'");
		             if($msg){
			             header('Location:'.$mainur.'streamers.php?msgnick=1');
		             }else{
			          //echo("Error description: " . mysqli_error($con));
		             	header('Location:'.$mainur.'streamers.php?msgnick=2');	
	                	}
				}
	}
	
}
$currentDate = new DateTime();

$lastYearDT = $currentDate->sub(new DateInterval('P19Y'));
 
//Get last year's date string in a YYYY-MM-DD format.
 $lastYear = $lastYearDT->format('Y-m-d');
 



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
  <?php if(@$_GET['msgnick'] == 2){ ?>
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          Nick name Already exist.
      </div>
      <div class="spacer30"></div>
      <?php } ?>
  
    <div class="col-xs-12">
      <?php include('inc/tabs_streamer.php'); ?>
        <div class="tab-content col-lg-10">
          <div class="tab-pane active" id="home">
            <div class="">
           <?php  
	  $idppew=@$_SESSION['id'];
	  $retee = mysqli_query($con,"select * from users where id ='$idppew'");
	    while($rowedit = mysqli_fetch_array($retee)) {
			
	  
	  ?>
         <form class="form-horizontal" name="registration" method="post" enctype="multipart/form-data" action="" id="registration">
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rowedit['fname'];?>" name="fname" placeholder="First Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rowedit['lname'];?>" name="lname" placeholder="Last Name">
            </div>
          </div>
          <div class="form-group">
            <label for="nickname" class="col-sm-2 control-label">Nick Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nickname" value="<?php echo $rowedit['nickname'];?>" name="nickname" placeholder="Nick Name">
            </div>
          </div>
         
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="passwordnew" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Contact No</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rowedit['contactno'];?>" name="contact" placeholder="Contact No">
            </div>
          </div>
          <div class="form-group">
            <label for="age" class="col-sm-2 control-label">Age</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="age" value="<?php echo $rowedit['age'];?>" name="age" max="<?php echo $lastYear; ?>" placeholder="age">
              <small>need to be 18+</small>
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="country" value="<?php echo $rowedit['country'];?>" name="country" placeholder="country">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address(optinal)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" value="<?php echo $rowedit['address'];?>" name="address" placeholder="address">
            </div>
          </div>
           <div class="form-group">
            <label for="zcode" class="col-sm-2 control-label">Zip code(optinal)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="zcode" value="<?php echo $rowedit['zcode'];?>" name="zcode" placeholder="zip code">
            </div>
          </div>
          <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-10">
           
               
        <select name="gender" class="form-control" id="gender">
         <?php $retttt=mysqli_query($con,"select * from gender");
							  $cnt=1;
							  while($rowgggg=mysqli_fetch_array($retttt))
							  {?>
                              <option value="male" <?php if($rowedit['gender']==$rowgggg['gender']){ echo "selected";}?>><?php echo $rowgggg['gender']; ?></option>
                              <?php
								  
								  }?>
          
        </select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Bio</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputEmail3" name="bio"  placeholder="Enter your Bio here..." style="height:160px"><?php echo $rowedit['bio'];?></textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="signup" class="btn btn-default">Update</button>
            </div>
          </div>
        </form>
        <?php } ?>
        
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