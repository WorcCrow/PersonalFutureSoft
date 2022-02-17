<?php
	require("../cgi/specialfunction.php");
	require("../cgi/encryption.php");
	require("../cgi/DBConnect.php");

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$link = "https"; 
	}else{
		$link = "http"; 
	}
	
	if(isset($_GET['code']) && isset($_GET['machine'])){
		$license_code = $_GET['code'];
		$machineid = $_GET['machine'];
		
		$result=GetRowData("SELECT * FROM owned_license INNER JOIN users ON owned_license.user_id = users.id where license_code = '$license_code'"); 
		
		if(count($result) > 0){
				if($result[0]['machine_id'] == ""){
					executesql("UPDATE owned_license SET machine_id='" . $machineid . "' WHERE license_code='" . $license_code . "'");
				}else{
					executesql("UPDATE owned_license SET new_machine_id='" . $machineid . "' WHERE license_code='" . $license_code . "'");
					$machineid = $result[0]['machine_id'];
				}
				$fullname = $result[0]['firstname'] . " " . $result[0]['lastname'];
				$licenseemail = $result[0]['email'];
				$expiration = $result[0]['expiration_date'];
				$contact = $result[0]['contact'];
				$purchasedate = $result[0]['purchase_date'];
				$license_code = $result[0]['license_code'];
				
				$license_file = encrypt("FullName=$fullname;LicenseEmail=$licenseemail;Expiration=$expiration;Contact=$contact;PurchaseDate=$purchasedate;MachineID=$machineid;LicenseCode=$license_code;");
				
				$unique_code = rand(1000,9999);
				$temp = fopen("../license/temp/$unique_code","a");
				fwrite($temp,$license_file);
				fclose($temp);
				
				echo encrypt($link . "://" . $_SERVER['HTTP_HOST'] . "/license/verify.php?file=$unique_code");
		}
	}else if(isset($_GET['file'])){
		$file = $_GET['file'];
		if(file_exists("temp/$file")){
			$f = fopen("temp/$file","r");
			echo fread($f,filesize("temp/$file"));
			unlink("temp/$file");
		}else{
			echo "Invalid Code";
		}
	}
?>