<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for updating user info    
if(isset($_POST['Submit']))
{
	$username = $_POST['uname'];
	$password= md5($_POST['password']);
	$type = "agent";
	
	$sql=mysqli_query($con,"select id from admin where username='$username'");
$row=mysqli_num_rows($sql);
	if($row>0){
		$_SESSION['msg']="User Name Already exist";
		
	}else{
	
$query=mysqli_query($con,"insert into admin(username,password,type) values('$username','$password','$type')");
$_SESSION['msg']="Profile Add successfully";
header('location:agents.php');
	}

}
include'header.php';
?>


      
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Information</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action=""  id="form1">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">User Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="uname" value="" id="uname" required >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" value="" required>
                              </div>
                          </div>
                            
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script>
    
$(document).ready(function () {
	
	$("#form1").validate({

								rules: {
						  
						   uname: {
					 required: true,
					
						 uname: true,
					
						 remote: {
					
								   url: "<?php echo $mainurl;?>admin/user_exist.php",
					
								   type: "post"
					
									 }
					
								},
						  
						  },
					  
					  messages: {
						  
						   uname: {
					
					
					
						  required: "Please Enter User Name.",
					uname: "Your email address must be in the format of name@gmail.com",
						  remote: "Email Already in use!"
					
					
					
						},
						  
						  },
				});
	
	
	
	});
  </script>
<style>
label.error {
    color: red;
}
</style>
  </body>
</html>
<?php } ?>