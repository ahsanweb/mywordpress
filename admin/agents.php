<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from admin where id='$adminid'");
if($msg)
{
header('location:agents.php');
}
}

include'header.php';
?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Agent</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Agent Details </h4> <a style="margin-left: 10px;" href="add_new_agent.php" class="btn btn-info" role="button">Add New</a>  
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">User Name</th>
                                  <th class="hidden-phone">Type</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from admin where type = 'agent'");
							  $cnt=1;
							  while(@$row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['type'];?></td>
                                  <td>
                                     
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
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