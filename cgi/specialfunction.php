<?php
	date_default_timezone_set('Asia/Manila');
	
	require("DBConnect.php");
	
	function ExecuteSql($query){
		GLOBAL $conn;
		$result=$conn->prepare($query); 
		$result->execute();
	}
	
	function GetRowData($query){
		GLOBAL $conn;
		
		$result = $conn->query($query);
		$result = $result->fetchAll();
		return $result;
	}

	function getSessionValue($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}else{
			return "";
		}
	}
			
	function clearAlertMsg(){
		unset($_SESSION['alertmsg']);
	}
	
	function fullname(){
		return $_SESSION['firstname'] . " " . $_SESSION['lastname'];
	}
	
	function wallet_fund(){
		$result = GetRowData("SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'")[0];
		return $result['wallet_fund'];
	}
	
	function wallet_earn(){
		$result = GetRowData("SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'")[0];
		return $result['wallet_earn'];
	}
	
	function update_wallet($fund){
		ExecuteSql("UPDATE users SET wallet_fund='" . $fund . "' WHERE id='" . $_SESSION['id'] . "'");
	}
	
	function RandChar(){
		$asciiChar = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$max = strlen($asciiChar)-1;
		$result = "";
		for($x=0;$x<16;$x++){
			$result .= $asciiChar[rand(0,$max)];
		}
		return $result;
	}
	
	function TimeToday(){
		return date("h:i:s A");
	}
	
	function DateToday(){
		return date("n/j/Y");
	}
	
	function ExpirationDate(){
		return (date("n") + 1) . date("/j/Y");
	}
	
	function DaysLeft($ExpDate){
		$exp = New DateTime($ExpDate); 
		$now = New DateTime('NOW');
		$left = $exp->format('U') - $now->format('U');
		$left = round($left/86400);
		if($left > 0){
			return $left;
		}else{
			return 0;
		}
	}
?>