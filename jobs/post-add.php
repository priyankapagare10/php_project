<?php 
	include('../config.php');            
	 
	
	$stmt =  $conn->prepare("select name, id  from job_categories order by  id,priority desc  ");          
	$stmt->execute();   
	$affected_rows_job_category = $stmt->rowCount();  
	$job_categories = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	
	$stmt =  $conn->prepare("select id,name from all_cities order by  state_code desc ");          
	$stmt->execute();   
	$city_id = $stmt->fetchAll(PDO::FETCH_OBJ); 


	$stmt =  $conn->prepare("select id,location_name from city_lacations  where city_id=:city_id ");          
	$stmt->bindValue(':city_id', $_COOKIE['search_city_id'] , PDO::PARAM_STR); 
	$stmt->execute();   
	$city_locations = $stmt->fetchAll(PDO::FETCH_OBJ); 	
	   
	
	
	$filename = basename(__FILE__); 
	include_once("../view/jobs/".$filename);
?>   