<?php  
	include '../config.php';     
	session_destroy();
	header("Location: ".ROOTPATH."/admin");	 
?>