<?php
	session_start();
	
	require("../cgi/DBConnect.php");
	require("../cgi/specialfunction.php");

	if(isset($_POST['category'])){
		switch($_POST['category']){
			case "license":
				availlicense();
				break;
			default:
				header("Location: ../");
		}
	}else{
		header("Location: ../");
	}
	
	function availlicense(){
		$software_id = $_POST['software'];
		if($software_id != "none"){
			$software_id = intval($software_id);
			
			$result = GetRowData("SELECT * FROM product WHERE id='1'");
			if(count($result) > 0){
				$software_name = $result[0]['product_name'];
				$software_price = $result[0]['product_price'];
				if(wallet_fund() >= $software_price){
					$generated_code = RandChar();
					$purchase_date = DateToday();
					$expiration_date = ExpirationDate();
					
					ExecuteSql("INSERT INTO owned_license(user_id, purchase_date, expiration_date, license_code, software) VALUES ('" . $_SESSION['id'] . "','" . $purchase_date . "','" . $expiration_date . "','" . $generated_code . "','" . $software_name . "')"); 
					
					$_SESSION['alerttype'] = "success";
					$_SESSION['alertstrongmsg'] = "Success! ";
					$_SESSION['alertmsg'] = "New license key has been added to your <a href='?license-manager' class='alert-link'>License Manager</a>.";
					
					update_wallet(wallet_fund() - $software_price);
				}else{
					$_SESSION['alerttype'] = "danger";
					$_SESSION['alertstrongmsg'] = "Failled! ";
					$_SESSION['alertmsg'] = "Not enought balance to buy this item.";
				}
				header("Location: ../profile.php?license-store");
			}
		}else{
			$_SESSION['alerttype'] = "danger";
			$_SESSION['alertstrongmsg'] = "Failled! ";
			$_SESSION['alertmsg'] = "Select Software to buy first.";
			header("Location: ../profile.php?license-store");
		}
	}
?>

