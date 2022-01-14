<?php require_once('dbconnection.php'); ?>
<?php if($_SESSION['usertype'] != "streamer"){
	header('location:index.php');
	
	 }
	 
	 if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
header('location:streamers.php');
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
  <?php if(@$_GET['msgp'] == 1){ ?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          Profile Image Changed Successfully.
      </div>
      <div class="spacer30"></div>
      <?php } ?>
  
    <div class="col-xs-12">
      <?php include('inc/tabs_streamer.php');?>
        <div class="tab-content col-lg-10">
          <div class="tab-pane active" id="home">
            <div class="">
              <?php 
			  $idpp=@$_SESSION['id'];;
		$ret = mysqli_query($con,"select * from users where id ='".$idpp."'");
	    while($row = mysqli_fetch_array($ret)) {?>
              <div class="view-account" style="    margin-top: 0;">
                <section class="module">
                  <div class="module-inner">
                    <div class="panel">
                    <div class="row">
                    <div class="col-md-3">
                    <h2 class="title" style="margin-top: 0;">Profile</h2>
                      <div class="user-info"> <img class="img-profile img-responsive center-block" style="object-fit: cover; height: 200px; width: 200px; margin: initial;" src="<?php if($row['image']!=""){ echo "uploads/streamer/".$row['image'];} else{ echo "images/dummy450x450.jpg"; }?>" alt="">
                      <a href="edit_profile_picture.php"><small>Edit Profile Picture</small></a>
                        
                      </div>
                      </div>
                      <div class="col-md-8">
                     <div class="tabbable-panel">
                        <div class="tabbable-line">
                         
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">
                            <form class="form-horizontal">
                                <fieldset class="fieldset">
                                  <h3 class="fieldset-title">Persnol Information</h3>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Name:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['fname'].' '.$row['lname']; ?></p>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Nick Name:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p> <?php if($row['nickname']!=""){ echo $row['nickname'];} ?></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Age:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p> <?php if($row['nickname']!=""){ echo $row['age'];} ?></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Gender:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p> <?php if($row['nickname']!=""){ echo $row['gender'];} ?></p>
                                    </div>
                                  </div>
                                
                                </fieldset>
                              </form>
                              <form class="form-horizontal">
                                <fieldset class="fieldset">
                                  <h3 class="fieldset-title">Contact Info</h3>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Phone:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['contactno']; ?></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Emaill:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['email']; ?></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Country:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['country']; ?></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Address:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['address']; ?></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3  col-sm-3 col-xs-12">Zip Code:</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['zcode']; ?></p>
                                    </div>
                                  </div>
                                  
                                </fieldset>
                              </form>
                              <form class="form-horizontal">
                                <fieldset class="fieldset">
                                  <h3 class="fieldset-title">Bio</h3>
                                  <div class="form-group">
                                   
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <p><?php echo $row['bio']; ?></p>
                                    </div>
                                  </div>
                                  
                                
                                </fieldset>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
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
  <script>
$( document ).ready(function() {
$(".tbsnaves").removeClass("active");
$(".1sttab").addClass("active");
});
</script>
  <?php include('inc/footer.php');?>