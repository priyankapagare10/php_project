<?php 	
	include_once('../config.php');   	

	 
	if($_REQUEST['job_category'])
	{  
		$stmt =  $conn->prepare("select  name  from job_categories   where   name  ='$_REQUEST[job_category]'");     
		$stmt->execute();   
		$affected_rows = $stmt->rowCount(); 
		if ($affected_rows > 0) 
		{
			echo json_encode(TRUE);
		} else
		{
			echo json_encode(FALSE);
		} 
		die;  
	}  
	
	if($_REQUEST['city'])
	{  
		$stmt =  $conn->prepare("select  name  from all_cities   where   name  ='$_REQUEST[city]'");     
		$stmt->execute();   
		$affected_rows = $stmt->rowCount(); 
		if ($affected_rows > 0) 
		{
			echo json_encode(TRUE);
		} else
		{
			echo json_encode(FALSE);
		} 
		die;  
	} 

	if($_REQUEST['select_sub_locn'])
	{  
		$stmt =  $conn->prepare("select  location_name  from city_lacations   where   location_name  ='$_REQUEST[select_sub_locn]' ");     
		$stmt->execute();   
		$affected_rows = $stmt->rowCount(); 
		if ($affected_rows > 0) 
		{
			echo json_encode(TRUE);
		} else
		{
			echo json_encode(FALSE);
		} 
		die;  
	} 	
	
	 
	
?>
		
		
		 