<footer>
        <p>&copy; 2020 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
	
	$("#registration").validate({

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
					
	function loginnow(){
		
		 var email 	= $( "input[name$=uemail]" ).val();		
		 var pass 	= $( "input[name$=pass]" ).val();
		
		$.ajax({
			type: 'POST',
			url:'<?php echo $mainurl;?>checck_login.php',
			data : { email : email, pass : pass },	
			success: function(html){
		
			if(html == 0){
				$('#messages').fadeIn('slow');
				$("#messages").html("Invalid Email or Password.");
				setTimeout(function() {
					$('#messages').fadeOut('slow');
				}, 3000);
			}
			
			if(html == 1){	
				window.location.href = '<?php echo $mainurl."/streamers.php";?>';
			}
				
			if(html == 2){			
				window.location.href = '<?php echo $mainurl;?>';
			}
			if(html == 3){			
				window.location.href = '<?php echo $mainurl;?>agents.php';
			}
		}
	  });												
	}
	
	
	function loginnowpopup(){
		
		 var email 	= $( "input[name$=uemailpp]" ).val();		
		 var pass 	= $( "input[name$=passpp]" ).val();
		
		$.ajax({
			type: 'POST',
			url:'<?php echo $mainurl;?>checck_login.php',
			data : { email : email, pass : pass },	
			success: function(html){
		
			if(html == 0){
				$('#messagespp').fadeIn('slow');
				$("#messagespp").html("Invalid Email or Password.");
				setTimeout(function() {
					$('#messagespp').fadeOut('slow');
				}, 3000);
			}
			
			if(html == 1){	
				window.location.href = '<?php echo $mainurl."/streamers.php";?>';
			}
				
			if(html == 2){			
				window.location.href = '<?php echo $mainurl;?>';
			}
			if(html == 3){			
				window.location.href = '<?php echo $mainurl;?>agents.php';
			}
		}
	  });												
	}
					
					
</script>
  </body>
</html>
