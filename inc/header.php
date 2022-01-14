
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style2.css" rel='stylesheet' type='text/css' />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    
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
          <a class="navbar-brand" href="index.php">Live Stream</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right cnav">
            <?php if(!isset($_SESSION['id'])){ ?>
            <li><a href="register_streamer.php">Streamer Sign Up</a></li>
            <li><a href="register_user.php">User Sign Up</a></li>
            <?php }else{ 
			?>
            
            <li id="fat-menu" class="dropdown">
            
               <?php $useridcureent=$_SESSION['id'];
			   $retpp = mysqli_query($con,"select * from users where id ='".$useridcureent."'");
	           while($rowpp = mysqli_fetch_array($retpp)) { ?>
              <a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="<?php if($rowpp['image']!=""){ echo "uploads/streamer/".$rowpp['image'];} else{ echo "images/dummy450x450.jpg"; }?>" width="25" />
                <span class="caret"></span>
              </a>
             <?php } ?>
              <ul class="dropdown-menu" aria-labelledby="drop3">
              <?php if($_SESSION['usertype'] == "streamer"){
					  echo ' <li><a href="streamers.php">My Account</a></li>';
					} else{?>
                <li><a href="#">My Account</a></li>
                <?php }
				 if($_SESSION['usertype'] == "streamer"){
					  echo '<li><a href="streamers.php">Settings</a></li>';
					}else if($_SESSION['usertype'] == "agent"){?>
                <li><a href="agents.php">Settings</a></li>
              <?php }else{
				  echo ' <li><a href="#">Settings</a></li>';
				  } ?>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
          <?php if(!isset($_SESSION['id'])){ ?>
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
          <?php } ?>
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
            <li><a href="<?php echo $mainurl;?>">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
          
        </div><!-- /.nav-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    