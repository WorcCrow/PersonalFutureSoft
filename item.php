<?php
	session_start();
	
	require("cgi/DBConnect.php");
	require("cgi/specialfunction.php");
	
	if(getSessionValue("id") != ""){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$result = GetRowData("SELECT * FROM product WHERE id = '" . $id . "'")[0];
			$product_id = $result['id'];
			$product_name = $result['product_name'];
			$product_category = $result['category'];
			$product_price = $result['product_price'];
			$product_photo = "/product/" . $result['category'] . "/" . $result['id'] . "/" . $result['product_photo'];
		}else{
			//header("Location: ./");
		}
	}else{
		//header("Location: ./");
	}
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
		
		<link rel="stylesheet" href="css/particles.css">
	</head>
	<body>
		
		<?php 
			if(getSessionValue("id") != ""){
				include("user_navbar.php");
			}else{
				header("Location: ./");
			}
		?>
		<br>
		<br>
		<div align="center">
				<div style="border:solid 1px red;width:400px;height:400px">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">

					  <!-- Indicators -->
					  <ul class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					  </ul>
					  
					  <!-- The slideshow -->
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <img src="la.jpg" alt="Los Angeles" width="100%" height="100%">
						</div>
						<div class="carousel-item">
						  <img src="chicago.jpg" alt="Chicago" width="100%" height="100%">
						</div>
						<div class="carousel-item">
						  <img src="ny.jpg" alt="New York" width="100%" height="100%">
						</div>
					  </div>
					  
					  <!-- Left and right controls -->
					  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					  </a>
					  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					  </a>
					</div>
				</div>
		</div>
		
	</body>
</html>
