<?php 
	include('../config.php');            
	
	//echo '<pre>'; print_r($_REQUEST);	die;
	 
	$stmt =  $conn->prepare("select id from all_cities WHERE  name=:name ");         
	$stmt->bindValue(':name', $_REQUEST['keyword1'], PDO::PARAM_STR); 
	$stmt->execute();   
	$city_id = $stmt->fetch(PDO::FETCH_OBJ);    
	$city_tabel = 'city_tabel_'.$city_id->id;
	
	 
	$category_id = explode("-",$_REQUEST['keyword2']);
	
	
	$stmt =  $conn->prepare("select name, id , priority from job_categories   ");          
	$stmt->execute();   
	$affected_rows_job_category = $stmt->rowCount();  
	$job_categories = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	
	$filename = basename(__FILE__); 
	include_once("../view/jobs/".$filename);  
?>   