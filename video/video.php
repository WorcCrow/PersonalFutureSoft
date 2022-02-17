<?php 
if(file_exists("disable.txt")){
	//echo "This video is protected of copywrite";
	echo $_SERVER['HTTP_USER_AGENT'];
}else{
	fopen("disable.txt","w");
	readfile("video.mp4");
}

?>