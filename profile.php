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
		<script src="js/javascript.js"></script>
		
		<link rel="stylesheet" href="css/particle.css">
	</head>
	<body>
		
		<?php 
			if(getSessionValue("id") != ""){
				//include("user_navbar.php");
				//readfile("default_navbar.html");
			}else{
				header("Location: ./");
			}
		?>
		
		<div class="pointer" id="user_wallet">
			<b>Fund: ₱</b><?php echo number_format(wallet_fund(), 2, '.', ',')?>
			<b>| Earn: ₱</b><?php echo number_format(wallet_earn(), 2, '.', ',')?>
			<span data-toggle="collapse" data-target="#more"><img src="media/dropdown.png"></span>
			
			<div id="more" class="collapse">
				<hr>
				<a href="?personal" class="user_menu_item">Personal</a>
				<a href="?wallet" class="user_menu_item">Wallet</a>
				<a href="?settings" class="user_menu_item">Settings</a>
				<a href="?logout" class="user_menu_item">Logout</a>
			</div>
		</div>
		
		<div id="main_content">
			<div id="left_content">
				<?php include("user_sidemenu.php") ?>
			</div>

			<div id="center_content">
				<?php
					if(getSessionValue("alertmsg") != ""){
						$alerttype = getSessionValue("alerttype");
						$alertstrongmsg = getSessionValue("alertstrongmsg");
						$alertmsg = getSessionValue("alertmsg");
						clearAlertMsg();
						include("alerts_template.php");
					}
				
					if(isset($_GET['logout'])){
						session_destroy();
						header("Location: ./");
						
					}else if(isset($_GET['ending'])){
						include("ending.php");
						
					}else if(isset($_GET['license-manager'])){
						include("license_manager.php");
						
					}else if(isset($_GET['license-store'])){
						include("license_store.php");
						
					}else if(isset($_GET['wallet'])){
						include("wallet.php");
						
					}else if(isset($_GET['settings'])){
						include("my_account.php");
						
					}else{
						include("license_manager.php");
						
					}
				?>
			</div>

			<div id="right_content">
			</div>

		</div>
		
		
	</body>
</html>
