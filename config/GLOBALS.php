<?php   
	ini_set('memory_limit', '512M');
	error_reporting(E_ERROR |  E_PARSE); 	
	$server = $_SERVER['HTTP_HOST'];    
	switch($server)
	{	
	case "www.aabstore.com":
		define("HST", "localhost");
		define("USR", "aabstore_user1");
		define("PWD", "aab!123");
		define("DBN", "aabstore_simlafoods");			 
		define("ROOTPATH", "http://www.aabstore.com/simlafoods");	
		define("ADMINPATH", "http://www.aabstore.com/simlafoods/admin");		  
		define("ABS_PATH", $_SERVER['DOCUMENT_ROOT']);		  
	break;	
	
	case "aabstore.com":
		define("HST", "localhost");
		define("USR", "aabstore_user1");
		define("PWD", "aab!123");
		define("DBN", "aabstore_simlafoods");				 
		define("ROOTPATH", "http://aabstore.com/simlafoods");	
		define("ADMINPATH", "http://aabstore.com/simlafoods/admin");		  
		define("ABS_PATH", $_SERVER['DOCUMENT_ROOT']);		  
	break;	
	 
	default:	    
		define("HST", "localhost");
		define("USR", "root");
		define("PWD", "");
		define("DBN", "simlafoods");				 
		define("ROOTPATH", "/simlafoods");		 
		define("ADMINPATH", ROOTPATH."/admin");
		define("ABS_PATH", $_SERVER['DOCUMENT_ROOT']."/simlafoods");		   
	break;
   }  