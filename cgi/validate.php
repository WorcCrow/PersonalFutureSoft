<?php
	include("./encryption.php");

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$link = "https"; 
	}else{
		$link = "http"; 
	}

	if($_GET['key'] == "9845321819713218"){
		echo encrypt($link . "://" . $_SERVER['HTTP_HOST'] . "/CloudServer/update.php");
	}else{
		echo encrypt("Invalid");
	}
?>