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
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contact='';
	$usertype=$_POST['usertype'];
	$bio = $_POST['bio'];
		$age 			= $_POST['age'];
	$country 			= $_POST['country'];
	$address 			= $_POST['address'];
	$gender 			= $_POST['gender'];
	$zcode              = $_POST['zcode'];
	$bio 			= str_replace("'","",$bio);
	
	$passwordnew 		= $_POST['passwordnew'];
  $uid=intval($_GET['uid']);
   if($passwordnew!=""){
	   $passwordnew 		= md5($passwordnew);
$query=mysqli_query($con,"update users set fname='$fname' ,lname='$lname' , contactno='$contact' , usertype='$usertype' , bio='$bio', `password`='$passwordnew', `age`='$age', `country`='$country', `address`='$address', `gender`='$gender', `zcode`='$zcode' where id='$uid'");
$_SESSION['msg']="Profile Updated successfully";
   }else{
	   $query=mysqli_query($con,"update users set fname='$fname' ,lname='$lname' , contactno='$contact' , usertype='$usertype' , bio='$bio', `age`='$age', `country`='$country', `address`='$address', `gender`='$gender', `zcode`='$zcode' where id='$uid'");
$_SESSION['msg']="Profile Updated successfully";
	   }
}
include'header.php';
?>


      <?php $ret=mysqli_query($con,"select * from users where id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['fname'];?>'s Information</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Ename</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly >
                              </div>
                          </div>
                           <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label" style="padding-left:40px;">New Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="passwordnew" placeholder="Password">
            </div>
          </div>
          
          
           <div class="form-group">
            <label for="age" class="col-sm-2 control-label" style="padding-left:40px;">Age</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="age" value="<?php echo $row['age'];?>" name="age" placeholder="age">
              <small>need to be 18+</small>
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-sm-2 control-label" style="padding-left:40px;">Country</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="country" value="<?php echo $row['country'];?>" name="country" placeholder="country">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label" style="padding-left:40px;">Address(optinal)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" value="<?php echo $row['address'];?>" name="address" placeholder="address">
            </div>
          </div>
           <div class="form-group">
            <label for="zcode" class="col-sm-2 control-label" style="padding-left:40px;">Zip code(optinal)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="zcode" value="<?php echo $row['zcode'];?>" name="zcode" placeholder="zip code">
            </div>
          </div>
          <div class="form-group">
            <label for="gender" class="col-sm-2 control-label" style="padding-left:40px;">Gender</label>
            <div class="col-sm-10">
           
               
        <select name="gender" class="form-control" id="gender">
          <option value="male" <?php if($row['gender']=="male"){ echo "selected";}?>>male</option>
          <option value="female"  <?php if($row['gender']=="female"){ echo "selected";}?>>female</option>
          <option value="other"  <?php if($row['gender']=="other"){ echo "selected";}?>>other</option>
        </select>
            </div>
          </div>
          
                           <div class="form-group">
                             <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Bio</label>
                             <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"><?php echo $row['bio'];?></textarea>
                            </div>
                          </div>
                          
                          
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Select User Type </label>
                              <div class="col-sm-10">
                                 <select class="form-control" name="usertype" required>
                                        <option value="streamer" <?php if ($row['usertype'] == "streamer"){echo "selected";}?>>Streamer</option>
                                        <option value="viewer" <?php if ($row['usertype'] == "viewer"){echo "selected";}?>>Viewer</option>
                                        <option value="agent" <?php if ($row['usertype'] == "agent"){echo "selected";}?>>Agent</option>
                                        
                                        
                                        </select>
                              </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Registration Date </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="regdate" value="<?php echo $row['posting_date'];?>" readonly >
                              </div>
                          </div>
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>