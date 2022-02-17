<?php
include("./cgi/encryption.php");

$fullname = "Francis Micko A. Bienes";
$licenseemail = "francismickobienes@gmail.com";
$expiration = "7/20/2019";
$contact = "09199693161";
$purchasedate = "6/1/2019";
$machineid = "TIMERS4";
$licensecode = "9845321819713218";

echo encrypt("FullName=$fullname;LicenseEmail=$licenseemail;Expiration=$expiration;Contact=$contact;PurchaseDate=$purchasedate;MachineID=$machineid;LicenseCode=$licensecode;");
?>