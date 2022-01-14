<?php require_once('dbconnection.php'); ?>
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
      <!-- Example row of columns -->
      <div class="row">
      <div class="col-xs-12">
		  
				<?php include('inc/tabs_streamer.php');?>
				<div class="tab-content col-lg-10">
         
        <?php 
          if(!isset($_SESSION['id'])){
			  header('location:index.php');
			  
			   }
		$type = "streamer";
		$curebtuid=@$_SESSION['id'];
		$retfff = mysqli_query($con,"select * from user_wishlist where user_id='$curebtuid'");
	    while($rowlll = mysqli_fetch_array($retfff)) {
		$myyyrowid=$rowlll['whish_listed_user'];
		
		
		
		$ret = mysqli_query($con,"select * from users where usertype ='".$type."' AND id='$myyyrowid'");
	    while($row = mysqli_fetch_array($ret)) {
			$uid=$row['id'];
			$rownwishlist="";
			$sqlwhishlist = mysqli_query($con,"select id from user_wishlist where whish_listed_user='$uid' AND user_id='$curebtuid'");
	        $rownwishlist = mysqli_num_rows($sqlwhishlist);
			
			
			?>
        
                <div class="col-md-4 streamerbox">
                  <div class="thumbnail">
                      <h2><?php if($row['nickname']!=""){ echo $row['nickname'];} ?> </h2>
                      <p><a href="<?php echo "streamer_single.php?s_id=".$row['id']; ?>" class="profileimage"><img src="<?php if($row['image']!=""){ echo "uploads/streamer/".$row['image'];} else{ echo "images/dummy450x450.jpg"; }?>"/></a></p>
                      <p><a class="btn btn-default" href="<?php echo "streamer_single.php?s_id=".$row['id']; ?>" role="button">Profile</a>   <a class="addtowishlist <?php if($rownwishlist>0){ echo "favstreamer";}?>" data-data = "<?php echo $row['id']?>" id="addtowishlist<?php echo $row['id']?>" style="cursor: pointer;" ><i class="fa fa-heart-o whishstate " style=" <?php if($rownwishlist>0){ echo "color:red;";}?> "></i></a></p>
                  </div>
                </div>
                
         <?php }
		 }?>
       </div>
     </div>
   </div>
       
       
       <div class="loginpopupR" style="display:none;">
       <div class="modal-dialog modal-login">
		<div class="modal-content">
			<form  method="post" action="" name="name="login">
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close closepopup" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="uemailpp" class="form-control" required="required">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
						</div>
						
						<input type="password" name="passpp" class="form-control" required="required">
					</div>
                    <div class="" id="messagespp"></div>
				</div>
				<div class="modal-footer">
					<label class="checkbox-inline pull-left"><input type="checkbox"> Remember me</label>
					<input type="button" onClick="loginnowpopup();" name="login" class="btn btn-primary pull-right" value="Sign in">
				</div>
			</form>
		</div>
	</div>
       </div>
       
      <div id="notification" style="display: none;">
  <span class="dismiss"><a title="dismiss this notification">x</a></span>
</div> 
       
       
      
      <hr>
      
         <?php if(!isset($_SESSION['id'])){
			  $ssid=0;
			  }else{
			 $ssid=$_SESSION['id'];
			 }?>
      <script type="text/javascript">
		$(document).ready(function(){
			var sssid="<?php echo $ssid; ?>";
			$(".addtowishlist").on('click', function(evt) {
			   var strea_id = $(this).data('data');
			   if(sssid==0){ $(".loginpopupR").show();
				   }else{
				  if ($("#addtowishlist"+strea_id).hasClass("favstreamer")) {
					  var del="yes";
					  
					  }
					  else{
						  var del="no";
						 }
				  
				  
			   $.ajax({
				  type: "POST",
				  url: 'addtowishlist.php',
				  data: ({strea_id: strea_id, del: del}),
				  success: function(data) {
					 
					   if(data == '1')
					   {
						  $('a[data-data="' + strea_id + '"] > i.whishstate').css({"color":"red"})
						  $("#addtowishlist"+strea_id).addClass("favstreamer");
						 $("#notification").empty();
						  $("#notification").fadeIn("slow").append('Added to wishlist');
						  $("#notification").fadeOut("slow");
					   }
					   else{
						   $('a[data-data="' + strea_id + '"] > i.whishstate').css({"color":"black"})
						   $("#addtowishlist"+strea_id).removeClass("favstreamer");
						   $("#notification").empty();
						   $("#notification").fadeIn("slow").append('Remove from wishlist');
						   $("#notification").fadeOut("slow");
					   }
				  }   
			   });
			}
			}); 
		});
		$(".closepopup").click(function(){
  $(".loginpopupR").hide();
 });
 

       
	</script>
     <style>
	 #notification {
    position:fixed;
    top:0px;
    width:100%;
    z-index:105;
    text-align:center;
    font-weight:normal;
    font-size:14px;
    font-weight:bold;
    color:white;
    background-color:#FF7800;
    padding:5px;
}
#notification span.dismiss {
    border:2px solid #FFF;
    padding:0 5px;
    cursor:pointer;
    float:right;
    margin-right:10px;
}
#notification a {
    color:white;
    text-decoration:none;
    font-weight:bold
}
	 </style> 
     <?php include('inc/footer.php');?>