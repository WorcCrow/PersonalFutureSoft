<?php
	session_start();
	
	require("../cgi/DBConnect.php");
	require("../cgi/specialfunction.php");
	
	if(getSessionValue("id") != ""){
		if(isset($_POST['action'])){
			switch($_POST['action']){
				case "claim_deposit":
				claim_deposit();
				break;
				
				default:
				header("Location: ../");
			}
		}else{
			header("Location: ./");
		}
	}else{
		header("Location: ./");
	}
	
	function claim_deposit(){
		GLOBAL $conn;
		$transcode = $_POST['transcode'];
		
		$result = GetRowData("SELECT * FROM receive_deposit WHERE transcode = '" . $transcode . "'")[0];
		
		if($result != NULL){
			if($result['amount'] > 0){
				if($result['user_id'] == ""){
					$_SESSION['alerttype'] = "success";
					$_SESSION['alertstrongmsg'] = "Congratulations! ";
					$_SESSION['alertmsg'] = "Successfuly added " . $result['amount'] ." in your account.";
					update_wallet(balance() + $result['amount']);
					ExecuteSql("UPDATE receive_deposit SET user_id='" . $_SESSION['id'] . "', fullname='" . fullname() . "', time='" . TimeToday() . "', date='" . DateToday() . "' WHERE transcode = '" . $transcode ."'");
				}else{
					$_SESSION['alerttype'] = "danger";
					$_SESSION['alertstrongmsg'] = "Failed! ";
					$_SESSION['alertmsg'] = "Transaction code has been used.";
				}
			}else{
				$_SESSION['alerttype'] = "danger";
				$_SESSION['alertstrongmsg'] = "Invalid! ";
				$_SESSION['alertmsg'] = "Transaction code not yet exist.";
			}
		}else{
			$_SESSION['alerttype'] = "danger";
			$_SESSION['alertstrongmsg'] = "Invalid! ";
			$_SESSION['alertmsg'] = "Transaction code not yet exist.";
		}
		
		header("Location: /profile.php?wallet");
	}
?>