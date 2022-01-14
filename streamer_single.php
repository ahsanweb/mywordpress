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


  <div class="topsingle">
   <div class="container">
     <div class="row">
        <div class="col-md-8" style="height:400px; border:1px solid black;">
        live stream here
        </div>
        <div class="col-md-4" style="height:400px; border:1px solid black;">
        chat box
        </div>
     </div>
    </div>
  </div>
</br>
</br>        
<div class="container"> 
  <div class="row">
  <?php if($_GET['s_id']){
		$idpp = $_GET['s_id'];
		}
		else{
			$idpp = "19";
			}
		$ret = mysqli_query($con,"select * from users where id ='".$idpp."'");
	    while($row = mysqli_fetch_array($ret)) {?>
    <div class="col-md-6">
      <div class="col-md-4">
          <div class="user-pic"> 
            <img class="img-profile img-circle img-responsive center-block" style="object-fit: cover; width:auto; height:160px;" src="<?php if($row['image']!=""){ echo "uploads/streamer/".$row['image'];} else{ echo "images/dummy450x450.jpg"; }?>" alt="">
             </div>
             </div>
             <div class="col-md-8">
          <div class="content-user">
           <h3 class="fieldset-title">  <?php echo $row['fname'].' '.$row['lname']; ?> <?php if($row['nickname']!=""){ echo "(".$row['nickname'].")";} ?></h3>
             <p><?php echo $row['bio']; ?></p>
                        
            <div class="row">
                <div class="col-md-4">
                     <p><strong>Age</strong></p>
                     <p><strong> <?php 
					 $from = new DateTime($row['age']);
                     $to   = new DateTime('today');
                     echo $from->diff($to)->y;
					 ?></strong></p>
                </div>
                <div class="col-md-4">
                     <p><strong>Gender</strong></p>
                     <p><strong> <?php echo $row['gender']; ?></strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Nationality</strong></p>
                    <p><strong> <?php echo $row['country']; ?></strong></p>
                </div>
            </div>
          </div>
      </div>
   </div>
          <?php }?>
          
           <div class="col-md-6">
              <div class="row">
                <div class="col-md-6" style="height:200px; border:1px solid black;">
                   pic or video
                 </div>
                 <div class="col-md-6" style="height:200px; border:1px solid black;">
                   pic or video
                 </div>
              </div>
            
    </div>
  </div>
</br>
</br>
<div class="container"> 
 <div class="row">
                <div class="col-md-3" style="height:200px; border:1px solid black;">
                   pic or video
                 </div>
                 <div class="col-md-3" style="height:200px; border:1px solid black;">
                   pic or video
                 </div>
                 <div class="col-md-3" style="height:200px; border:1px solid black;">
                   pic or video
                 </div>
                 <div class="col-md-3" style="height:200px; border:1px solid black;">
                   pic or video
                 </div>
    </div>
 </div>

<hr>
<script type="text/javascript">
		$(document).ready(function(){
			$(".addtowishlist").on('click', function(evt) {
			   var strea_id = $(this).data('data');
			   alert(strea_id);
			   $.ajax({
				  type: "POST",
				  url: 'addtowishlist.php',
				  data: ({strea_id: strea_id}),
				  success: function(data) {
					   if(data == '1')
					   {
						  $('a[data-data="' + strea_id + '"] > i.whishstate').css({"color":"red"})
					   }
					   else{
						   $('a[data-data="' + strea_id + '"] > i.whishstate').css({"color":"red"})
					   }
				  }   
			   });   
			}); 
		});
	</script>
<?php include('inc/footer.php');?>
