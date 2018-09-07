<?php 
	include('../config.php');             
	/*
	$test = explode("_",$_GET['url']);
	$city_tabel = "city_tabel_".end($test);
	$_GET['url'] = str_replace("_".end($test), "", $_GET['url']); 
	 
	 
	$stmt =  $conn->prepare("select * from $city_tabel  WHERE  url=:url ");           
	$stmt->bindValue(':url', $_GET['url'], PDO::PARAM_STR);  
	$stmt->execute();   
	$job_detail = $stmt->fetch(PDO::FETCH_OBJ);  
	
	$stmt =  $conn->prepare("select name from job_categories  WHERE  id=:id ");           
	$stmt->bindValue(':id', $job_detail->category_id  , PDO::PARAM_INT);  
	$stmt->execute();   
	$job_categorie = $stmt->fetch(PDO::FETCH_OBJ); 
	
	$test = explode(",",$job_detail->sub_category_id);   
	foreach($test as $dt)
	{
		 
		$stmt =  $conn->prepare("select name from sub_job_categories  WHERE  id=:id    ");           
		$stmt->bindValue(':id', $dt, PDO::PARAM_STR);  
		$stmt->execute();   
		$sub_job_categorie = $stmt->fetch(PDO::FETCH_OBJ);
		$sub_job_categorie_name .= $sub_job_categorie->name.',';
	}
	$sub_job_categorie_name = trim($sub_job_categorie_name,",");
	 
	*/
	
	$filename = basename(__FILE__); 
	include_once("../view/jobs/".$filename);  
?>   