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
		
		<div align="center">
			<div id="product_container">
				<br>
				<br>
				<?php 
					$category = 'hardware';
					$result = GetRowData("SELECT * FROM `product` WHERE category = '" . $category . "'");
					
					foreach($result as $res){
						$product_name = $res['product_name'];
						$product_price = $res['product_price'];
						$product_photo = "/product/" . $res['category'] . "/" . $res['id'] . "/" . $res['product_photo'];
						$product_path = "https://www.facebook.com/groups/PisoNetOwnersofthePhilippines/members/";
						include("product_template.php");
					}
					// for($x = 0 ; $x < 100; $x++){
						// $product_name = "Mikrotik Mikrotik Mikrotik";
						// $product_price = "2,000";
						// $product_photo = "/users/16/profile_photo.jpg";
						// $product_path = "https://www.facebook.com/groups/PisoNetOwnersofthePhilippines/members/";
						// include("product_template.php");
					// }
				?>
					
			</div>
		</div>
		
	</body>
</html>
