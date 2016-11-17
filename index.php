<html lang="en">
	<head>
		<title>Student Learner</title>
		<!-- CSS -->
		<script src="assets/js/jquery-1.11.1.min.js" rel="stylesheet" media="screen"></script>
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/style.css" rel="stylesheet" media="screen">
	   	<script>	
	   	$(function(){	
	   		$("#l1").hide();   	
			$("#preloader").hide();
	    	$("#flip").click(function(){
	        $("#home").slideUp(50,function() {

	        $("#l1").delay(800).fadeIn();
	    });
	    });
	    

		});
	    </script>    
	</head>
	<body>
		<!-- Home start -->
		<div id="home" class="pfblock-image screen-height front">
			        <div id="home1" class="home-overlay"></div>
					<div class="intro">
						<div class="start">Welcome to the Learning management system</div>
						<h1>LEARNING MANAGEMENT SYSTEM</h1>
						<div class="start">Login to your dashboard by clicking the button below </div>
					</div>

			        <a id="flip"href="#" >
					<div class="scroll-down">
			            <span>
			                <i class="fa fa-angle-down fa-2x"></i>
			            </span>
					</div>
			        </a>
		</div>
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
						</div><!-- .container -->

					</nav>
		</header>
		<!-- Home end -->
		<div id="l1" class = "l2" align="center">
				<div  class="container">
					<div class="row">			  
						<div  class="l1" style="width:500px;" id="login">
							<div  style="position: relative;margin-height:300;" class="panel panel-default">
					  			<div class="panel-body">
					  				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
					  					<h3>SELECT YOUR USER TYPE</h3>
					     			&nbsp			    
					     			&nbsp
										<div  class="input-group">
						      				<div class="input-group-btn">
									        	<!-- <select type="button" id="togg" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Select user <span class="caret"></span>
									       			<!--  <ul class="dropdown-menu"> 
										          <option><button id="stu" href="http://www.google.com">Student</button></option>
										          <option><a id="teach" href="http://www.google.com">Teacher</a></option>
										          <option><a id="adm" href="http://www.google.com">Admin</a></option>
									          	</select> -->
									          	<!-- <button class="lg btn btn-default" style="width:150px;" id="sel" >Select User</button> -->
									          	<button class="lg btn btn-default" style="width:150px;" id="stu" >Student</button>
									          	<button class="lg btn btn-default" style="width:150px;" id="tec" >Teacher</button>
									          	<button class="lg btn btn-default" style="width:150px;" id="adm" >Admin</button>
						      				<!-- /btn-group -->
							      				</div>
							    		</div>
						      				<input type="text" name="username" class="form-control" maxlength="40" aria-label="Register Number" placeholder="Register Number">
						    			
						    			
						    		
					     			&nbsp			    
					    			<input type="password" name="pass" maxlength="50" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
										
					     			&nbsp
					     			&nbsp

								&nbsp
								<input class="lg btn btn-default" type="submit" name="submit" value="Login"> 
								<!-- <button class="lg btn btn-default"  onClick="parent.location='teacher.php'" >LOGIN</button> -->
								</form>
							</div>
						</div>
					  </div>
				</div>
			</div>
		</div> 
		<!-- New php -->
		//use bcrypt for security
		
		<?php 

		//Connects to your Database 
		mysql_connect("localhost", "root", "password") or die (mysql_error ());
		//mysql_connect("db location", "username", "password") or die(mysql_error()); 
		mysql_select_db("dbtest") or die(mysql_error()); 
		//Checks if there is a login cookie
		if(isset($_COOKIE['ID_your_site'])){ //if there is, it logs you in and directes you to the members page
		 	$username = $_COOKIE['lms']; 
		 	$pass = $_COOKIE['123'];
		 	$check1 = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
		 	// $check2co = mysql_query("SELECT * FROM users WHERE password = '$pass'")or die(mysql_error());


		 	while($info = mysql_fetch_array( $check1 )){
		 		if ($pass != $info['password']){}
		 		else{
		 			header("Location: teacher.php");
				}
		 	}
		 }

		 //if the login form is submitted 
		 if (isset($_POST['submit'])) {
			// makes sure they filled it in
		 	if(!$_POST['username']){
		 		die('You did not fill in a username.');
		 	}
		 	if(!$_POST['pass']){
		 		die('You did not fill in a password.');
		 	}
		 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());
		 	$check2 = mysql_query("SELECT * FROM users WHERE password = '".$_POST['pass']."'")or die(mysql_error());
		 //Gives error if user dosen't exist
		 $check = mysql_num_rows($check);
		 if ($check == 0){
			// die('That user does not exist in our database.<br /><br />If you think this is wrong <a href="index.php#">try again</a>.');
			echo "<script type='text/javascript'>alert('That user does not exist in our database.Please login again.');</script>";
		}

		while($info = mysql_fetch_array($check2)){
			$_POST['pass'] = stripslashes($_POST['pass']);
		 	$info['password'] = stripslashes($info['password']);
		 	// $_POST['pass'] = md5($_POST['pass']);
		 	print("1");
			//gives error if the password is wrong
		 	if ($_POST['pass'] != $info['password']){
			// echo "<script type='text/javascript'>alert('Incorrect password, please try again.');</script>";
		 		print("2");
		 		die('Incorrect password, please try again.');
		 	}
			
			else{ // if login is ok then we add a cookie 

				$_POST['username'] = stripslashes($_POST['username']); 
				$hour = time() + 10; 
				setcookie(lms, $_POST['username'], $hour); 
				setcookie(123, $_POST['pass'], $hour);	 
		 
				//then redirect them to the members area 
				header("Location: teacher.php"); 
			}
		}
		}
		else{
		// // if they are not logged in 
			
		 }
		?>
				<!-- old php -->
				<!-- <?php
					// Connect to database server
					//mysql_connect("localhost", "root", "password") or die (mysql_error ());

					// Select database
					//mysql_select_db("lms_db") or die(mysql_error());

					// SQL query
					// $strSQL = "SELECT * FROM admin";

					// Execute the query (the recordset $rs contains the result)
					//$rs = mysql_query($strSQL);
					// Loop the recordset $rs
					// Each row will be made into an array ($row) using mysql_fetch_array
					//while($row = mysql_fetch_array($rs)) 
					{
					   // Write the value of the column FirstName (which is now in the array $row)
					  //echo "<br/>".$row['loginid']."----". $row['password']. "<br />";
					}
				   



					// Close the database connection
					// mysql_close();
				?>
				-->
	</body>
</html>