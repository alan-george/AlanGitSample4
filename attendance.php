<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- 	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content=""> -->

		<title>Moodle</title>

		<!-- CSS -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
		<!-- <link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
		<link href="assets/css/animate.css" rel="stylesheet"> -->
	    
		<!-- Custom styles CSS -->
		<link href="assets/css/style.css" rel="stylesheet" media="screen">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- // <script src="assets/js/modernizr.custom.js"></script> -->
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
                        <li><a href="#skills">Skills</a></li>
						<li><a href="#testimonials">Testimonials</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a href="index.php">Log Out</a></li>
					</ul>
				</div>
						</div><!-- .container -->

					</nav>
		</header>

		<div class="start"><center><h1>ATTENDANCE MONITORING</h1></center></div>
			<div  style="width:300px;height:200px;"class="l1 panel panel-default">
				<select type="button" name="logtype" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Select user <span class="caret"></span>
        <ul class="dropdown-menu">
          <option><a id="stu" href="#">MCA1</a></option>
          <option><a id="teach" href="#">BCA1</a></option>
          <option><a id="adm" href="#">MCA3</a></option>
          <option role="separator" class="divider"></option>
          </select>
          <br/><br/>
 <?php
	// Connect to database server
	mysql_connect("localhost", "root", "password") or die (mysql_error ());

	// Select database
	mysql_select_db("lms_db") or die(mysql_error());

	// SQL query
	$strSQL = "SELECT * FROM student";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	 echo "<table><tr><th>ID</th><th>Name</th></tr>";
	while($row = mysql_fetch_array($rs)) 
	{
	   // Write the value of the column FirstName (which is now in the array $row)
	  echo "<tr><td>".$row['regno']. "</td><td>".$row['studentname']."</td></tr>". "<br />";
	}
	// Close the database connection
	mysql_close();
?>
          <button class="lg btn btn-default" type="button"  onClick="parent.location=''">OK</button>
			</div>
			
			<div style="width:300px;height:100px;"class="l1 panel panel-default">
			<div class="panel-body">
				<button class="lg btn btn-default" type="button"  onClick="parent.location='teacher.html'">SUBMIT ATTENDANC</button>
			</div>
			</div>
			
	</body>
</html>
