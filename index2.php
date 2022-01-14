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

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style2.css" rel='stylesheet' type='text/css' />

    
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right cnav">
            <li><a href="#">Streamer Sign Up</a></li>
            <li><a href="#">User Sign Up</a></li>
            
          </ul>
          <form class="navbar-form navbar-right" name="login" action="" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" name="uemail" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="pass" class="form-control">
            </div>
            <input type="button" onClick="loginnow();" class="btn btn-success" name="login" value="Sign in" >
            <div class="" id="messages"></div>
          </form>
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
    <div class="container">
    
	<nav id="navbar-example" class="navbar navbar-default navbar-static">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
          
        </div><!-- /.nav-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-4 streamerbox">
          <div class="thumbnail">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2020 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
						
							$("#registration").validate({

								rules: {
						  
						   email: {
					
					
					
						  required: true,
					
						 email: true,
					
						 remote: {
					
								   url: "<?php echo $siteurl;?>email_exist.php",
					
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
			url:'<?php echo $siteurl;?>checck_login.php',
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
				window.location.href = 'welcome_streamer.php';
			}
				
			if(html == 2){			
				window.location.href = 'welcome_viewr.php';
			}
		}
	  });												
	}
					
					
</script>
  </body>
</html>
