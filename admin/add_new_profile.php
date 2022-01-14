<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
}

// for updating user info    
if(isset($_POST['Submit'])){
	$fname 		= $_POST['fname'];
	$lname 		= $_POST['lname'];
	$email 		= $_POST['email'];
	$password 	= md5($_POST['password']);
	$contact 	= '';
	$usertype 	= $_POST['usertype'];
	$bio 		= $_POST['bio'];
	$agent_id 	= '000';
	
	$query = mysqli_query($con,"insert into users(fname,lname,email,password,contactno,bio,usertype, agent_id,check_first_login) values('$fname','$lname','$email','$password','$contact','$bio','$usertype', '$agent_id','0')");

	$_SESSION['msg'] = "Profile Add successfully";
	header('location:manage-users.php');
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
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fname" value="" required >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Ename</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="" required >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="" id="email" required >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" value="" required>
                              </div>
                          </div>
                            
                            <div class="form-group">
                             <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Bio</label>
                             <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>
                            </div>
                          </div>
                          
                          
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Select User Type </label>
                              <div class="col-sm-10">
                                 <select class="form-control" name="usertype" required>
                                        <option value="">Please Select.....</option>
                                        <option value="streamer">Streamer</option>
                                        <option value="viewer">Viewer</option>
                                        <option value="agent">Agent</option>
                                        
                                        
                                        </select>
                              </div>
                          </div>
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Submit" class="btn btn-theme"></div>
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
						  
						   email: {
					
					
					
						  required: true,
					
						 email: true,
					
						 remote: {
					
								   url: "<?php echo $mainurl;?>email_exist.php",
					
								   type: "post"
					
									 }
					
								},
						  
						  },
					  
					  messages: {
						  
						   email: {
					
					
					
						  required: "Please Enter Your Email.",
					
					
					
						  email: "Your email address must be in the format of name@gmail.com",
					
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
