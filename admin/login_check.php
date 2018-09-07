<?php 		
	include_once('../../config.php');  
	if(!isset($_SESSION['admin1']))
	{
		header("Location: ".ROOTPATH."/admin/"); 
	} 
?>