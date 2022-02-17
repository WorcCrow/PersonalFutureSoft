<?php
	session_start();
	include("cgi/specialfunction.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Future Soft</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/particle.css">
		<script src="js/javascript.js"></script>
	</head>
	<body>
		<?php 
			if(getSessionValue("id") != ""){
				header("Location: ./profile.php");
			}else{
				readfile("default_navbar.html");
			}
		 
			if(getSessionValue("alertmsg") != ""){
				$alerttype = getSessionValue("alerttype");
				$alertstrongmsg = getSessionValue("alertstrongmsg");
				$alertmsg = getSessionValue("alertmsg");
				clearAlertMsg();
				include("alerts_template.php");
			}
			
			if(isset($_GET['login'])){
				readfile("login.html");
			}
			
			if(isset($_GET['register'])){
				readfile("register.html");
			}
			
			if(isset($_GET['forgot'])){
				readfile("forgot.html");
			}
			
			if(isset($_GET['home'])){
				readfile("home.html");
			}
			
			if(isset($_GET['about'])){
				readfile("about.html");
			}
		?>
		<!-- particles.js container -->
		<div id="particles-js"></div>

		<!-- scripts -->
		<script src="js/particles.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
