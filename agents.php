<?php require_once('dbconnection.php'); ?>
<?php if($_SESSION['usertype'] != "agent"){
	header('location:index.php');
	
	 }
	 
	 if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
header('location:agents.php');
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
					<div class="tab-pane active" id="home">                
						<div class="">
						<table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">Username</th>
                                  <th>Online</th>
                                  <th>Time</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
							  $agentid = $_SESSION['id']; 
							  $ret=mysqli_query($con,"select * from users where agent_id='$agentid'");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><span class="badge green">Online</span></td>
                                  <td><?php echo $row['posting_date']; ?></td>
                                 
                                  <td>
                                     
                                     <a href="update_steamer.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="agents.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>         
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