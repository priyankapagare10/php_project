<?php 
	include('../config.php');   
	
	
	// Get All Cities..
	$stmt =  $conn->prepare("select name,id from all_cities order by  state_code desc,name");        
	$stmt->execute();  
	$get_all_cities = $stmt->fetchAll(PDO::FETCH_OBJ); 
	
	
	$stmt =  $conn->prepare("select name,id from all_categories order by type");        
	$stmt->execute();  
	$get_all_categories = $stmt->fetchAll(PDO::FETCH_OBJ); 
	
	if(isset($_COOKIE['search_city_id']))
		$search_city_name = $_COOKIE['search_city_name'];
	else
		$search_city_name = '';
 
		
	$filename = basename(__FILE__); 
	include_once("../view/".$filename); 
?>   