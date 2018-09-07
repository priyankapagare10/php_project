<?php 
	session_start();
	ini_set('date.timezone', 'Asia/Kolkata');
	error_reporting(E_ERROR | E_WARNING);
	#error_reporting(E_ALL);  		 
	include_once('config/GLOBALS.php'); 
	include_once('config/database.php');  
	
	/* 
	$class_add = explode('/',$_SERVER['REQUEST_URI']);       
	$class_add_root = explode('/',ROOTPATH);   
	echo '<pre>'; print_r($class_add);
	echo '<pre>'; print_r($_SERVER['REQUEST_URI']); 
	echo '<br>'.end($class_add);
	   
	if (!preg_match('/[^A-Za-z0-9]/', 'dff')) // '/[^a-z\d]/i' should also work.
	{
		echo 11;
	}   
	if($class_add[count($class_add)-2]==end($class_add_root))
	{
	   echo 11;
	   die; 
	}
   else
   {
	   echo 12;
	   die;
	   
   }
	*/	  
?>