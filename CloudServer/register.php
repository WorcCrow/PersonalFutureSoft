<?php
	require("cgi/DBConnect.php");

	if(isset($_POST['submit'])){
		switch($_POST['submit']){
			case "Register":
				Register();
		}
	}
	function Register(){
			GLOBAL $conn;
		
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			echo "SELECT count(email) FROM users WHERE email='" . $email . "'" . "<br>";
			$result = $conn->query("SELECT count(email) FROM users WHERE email='" . $email . "'");
			
			$count = $result->fetchColumn();
			echo "There is " . $count . " item in the database<br>";
			
			if($count == 0){
				$conn->query("insert into users(firstname, middlename, lastname, address, contact, email, password) values ('$firstname','$middlename','$lastname','$address','$contact','$email','$password')");
				echo "Account created successfuly.";
			}else{
				echo "User already exist. try to recover your account thru email.";
			}
	}
	
	require("html/register.html");
?>

