<?php
	session_start();
	
	require("../cgi/DBConnect.php");
	require("../cgi/specialfunction.php");

	if(isset($_POST['action'])){
		switch($_POST['action']){
			case "register":
				register();
				break;
			case "login":
				login();
				break;
			case "change_password":
				update_password();
				break;
			case "update_personal_info":
				update_personal_info();
				break;
			default:
				header("Location: ../");
		}
	}else{
		header("Location: ../");
	}
	
	function register(){
		$wallet_address = rand(10000000,99999999);
	
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$result = GetRowData("SELECT count(email) FROM users WHERE email='" . $email . "'")[0];
		$count = $result[0];
		
		if($count == 0){
			ExecuteSql("INSERT INTO users(firstname, middlename, lastname, address, contact, email, password, wallet_address) values ('$firstname','$middlename','$lastname','$address','$contact','$email','$password','$wallet_address')");
			$_SESSION['alerttype'] = "success";
			$_SESSION['alertstrongmsg'] = "Congratulations! ";
			$_SESSION['alertmsg'] = "Account created successfuly.";
			header("Location: ../?login");
		}else{
			$_SESSION['alerttype'] = "danger";
			$_SESSION['alertstrongmsg'] = "Sorry! ";
			$_SESSION['alertmsg'] = "Email already inused. try to recover your account thru email.";
			header("Location: ../?register");
		}
	}
	
	function login(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$result = GetRowData("SELECT * FROM users WHERE email='$email' AND password='$password'");
		
		if(count($result) > 0){
			$_SESSION['id'] = $result[0]['id'];
			$_SESSION['firstname'] = $result[0]['firstname'];
			$_SESSION['middlename'] = $result[0]['middlename'];
			$_SESSION['lastname'] = $result[0]['lastname'];
			$_SESSION['address'] = $result[0]['address'];
			$_SESSION['contact'] = $result[0]['contact'];
			$_SESSION['email'] = $result[0]['email'];
			$_SESSION['password'] = $result[0]['password'];
			$_SESSION['wallet_address'] = $result[0]['wallet_address'];
			header("Location: ../profile.php");
		}else{
			$_SESSION['alerttype'] = "danger";
			$_SESSION['alertstrongmsg'] = "Failed! ";
			$_SESSION['alertmsg'] = "Incorrect email  or password.";
			header("Location: ../?login");
		}
	}
	
	function update_password(){
		GLOBAL $conn;
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];
		if($new_password == $confirm_password){
			if($old_password == $_SESSION['password']){
				$_SESSION['alerttype'] = "success";
				$_SESSION['alertstrongmsg'] = "Success! ";
				$_SESSION['alertmsg'] = "Password changed successfuly.";
				$_SESSION['password'] = $new_password;
				ExecuteSql("UPDATE users SET password='$new_password' WHERE id='" . $_SESSION['id'] . "'");
				header("Location: ../profile.php");
			}else{
				$_SESSION['alerttype'] = "danger";
				$_SESSION['alertstrongmsg'] = "Failed! ";
				$_SESSION['alertmsg'] = "Please enter your current password correctly.";
				header("Location: ../profile.php");
			}
		}else{
			$_SESSION['alerttype'] = "danger";
			$_SESSION['alertstrongmsg'] = "Failed! ";
			$_SESSION['alertmsg'] = "New password doesn't match.";
			header("Location: ../profile.php");
		}
	}
	
	function update_personal_info(){
		GLOBAL $conn;
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$_SESSION['alerttype'] = "success";
		$_SESSION['alertstrongmsg'] = "Success! ";
		$_SESSION['alertmsg'] = "Account information updated successfuly.";
		$_SESSION['address'] = $address;
		$_SESSION['contact'] = $contact;
		ExecuteSql("UPDATE users SET address='$address', contact='$contact' WHERE id='" . $_SESSION['id'] . "'");
		header("Location: ../profile.php");
	}
?>

