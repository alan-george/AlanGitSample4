<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- 	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content=""> -->

		<title>Student Learner-Admin</title>
		<!-- CSS -->
		<script src="assets/js/jquery-1.11.1.min.js" rel="stylesheet" media="screen"></script>
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/style.css" rel="stylesheet" media="screen">
	   	  
	</head>
	<body>
		<header id="h1" class="header">

					<nav class="navbar navbar-custom" role="navigation">

						<div class="container">

							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index.html">Student Learning System</a>
							</div>
							<div class="collapse navbar-collapse" id="custom-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#home">Home</a></li>
						<li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Works</a></li>
                        <!-- <li><a href="#skills">Skills</a></li> -->
						<!-- <li><a href="#testimonials">Testimonials</a></li> -->
						<!-- <li><a href="#contact">Contact</a></li> -->
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div>
						</div><!-- .container -->

					</nav>
		</header>
		<center><br><br><br>
			<div id="l1" class = "l2" align="center">
				<div  class="container">
					<div class="row">			  
						<div  class="l1" style="width:300px;height:600px;" id="login">
							<div  style="position: relative;margin-height:300;" class="panel panel-default">
					  			<div class="panel-body">

			                   <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
					  				<h3>ENTER STUDENT DETAILS</h3>
					     			
					     			ENTER REGISTRATION NUMBER<input type="text" name="username" class="form-control" maxlength="10" aria-label="Register Number" placeholder="Register Number">
					     			<br>
								<input class="lg btn btn-default" type="submit" name="submit" value="CHECK"> 
								<!-- <button class="lg btn btn-default"  onClick="parent.location='teacher.php'" >LOGIN</button> -->
								</form>
								</div>
						</div>
					  </div>
				</div>
			</div>
		</div> 

		<?php 

		//Connects to your Database 
		mysql_connect("localhost", "root", "password") or die (mysql_error ());
		//mysql_connect("db location", "username", "password") or die(mysql_error()); 
		mysql_select_db("lms_db") or die(mysql_error()); 
		//Checks if there is a login cookie
	
		if(isset($_COOKIE['ID_your_site']))
		{ //if there is, it logs you in and directes you to the members page
		 	$username = $_COOKIE['lms']; 
		 	$pass = $_COOKIE['123'];
		 	$check1 = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
		 
		 	// $check2co = mysql_query("SELECT * FROM users WHERE password = '$pass'")or die(mysql_error());
		 	}

		 //if the login form is submitted 
		 if (isset($_POST['submit'])) {
			// makes sure they filled it in
		 	if(!$_POST['username']){
		 		die('You did not fill in a username.');
		 	}
		 	
		 	$check = mysql_query("SELECT * FROM student WHERE regno = '".$_POST['username']."'")or die(mysql_error());
		
		 //Gives error if user dosen't exist
		 $check = mysql_num_rows($check);
		 if ($check == 0){
			// die('That user does not exist in our database.<br /><br />If you think this is wrong <a href="index.php#">try again</a>.');
			echo "<script type='text/javascript'>alert('That user does not exist in our database.Please login again.');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('That user exists in our database.Edit details below.');</script>";
		}

		}
		else{
		// // if they are not logged in 
			
		 }
		?>