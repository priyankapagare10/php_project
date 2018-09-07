<?php 
	include('../config.php'); 

	if(isset($_REQUEST['get_data']))
	{
		$stmt =  $conn->prepare("select * from  all_cities WHERE  name=:name ");         
		$stmt->bindValue(':name', $_REQUEST['keyword1'], PDO::PARAM_STR); 
		$stmt->execute();   
		$city_id = $stmt->fetch(PDO::FETCH_OBJ);    
		$city_tabel = 'city_tabel_'.$city_id->id; 
		$category_id = explode("-",$_REQUEST['keyword2']);
	}
	
	
	if($_SESSION['month_salary_val'])
		$month_salary_val = "and max_salary >= ".$_SESSION['month_salary_val']; 
	else
		$month_salary_val = "";
	
	if($_SESSION['search_by_type_val'])
	{
		$test_array = explode(",",$_SESSION['search_by_type_val']); 
		array_pop($test_array); 
		
		foreach($test_array as $key=>$dt)
		{ 	
			if($key > 0) 
				$type .= " || type=".$dt; 
			else  
				$type .= "and (type=".$dt;
		}  
		$type .= ")";    
		
	}else
		$type = "";  

	if($_SESSION['set_job_sub_category_val'])
	{
		$test_array = explode(",",$_SESSION['set_job_sub_category_val']); 
		array_pop($test_array); 
		
		foreach($test_array as $key=>$dt)
		{ 	
			if($key > 0) 
				$sub_cat .= " || sub_category_id=".$dt; 
			else  
				$sub_cat .= "and (sub_category_id=".$dt;
		}  
		$sub_cat .= ")";    
		
	}else
		$sub_cat = "";


	if($_SESSION['search_by_locality_val'])
	{
		$test_array = explode(",",$_SESSION['search_by_locality_val']); 
		array_pop($test_array); 
		
		foreach($test_array as $key=>$dt)
		{ 	
			if($key > 0) 
				$loc_id .= " || location_id=".$dt; 
			else  
				$loc_id .= "and (location_id=".$dt;
		}  
		$loc_id .= ")";    
		
	}else
		$loc_id = "";	
	 
	 
	//echo "select * from $city_tabel  WHERE  category_id=:category_id  $type $month_salary_val $sub_cat  $loc_id "; 
	$stmt =  $conn->prepare("select * from $city_tabel  WHERE  category_id=:category_id  $type $month_salary_val $sub_cat  $loc_id ");           
	$stmt->bindValue(':category_id', end($category_id), PDO::PARAM_INT);   
	$stmt->execute();   
	$affected_rows = $stmt->rowCount();  
	if($affected_rows > 0)
		$all_jobs_result = $stmt->fetchAll(PDO::FETCH_OBJ);
	else
		$all_jobs_result  = null;      
?>

	 <div id="dataRight">
    	<ul class="resList">
			<?php 
				if(!empty($all_jobs_result))
				{
				foreach($all_jobs_result as $dt)
				{ 
				
					if($dt->type==1) $type =  "Work From Home";	  else if($dt->type==2) $type =  "Part Time"; else if($dt->type==3) $type =  "Full Time";
					
						$stmt =  $conn->prepare("select name from job_categories  WHERE  id=:id    ");         
						$stmt->bindValue(':id',  $dt->category_id, PDO::PARAM_INT);   
						$stmt->execute();   
						$role = $stmt->fetch(PDO::FETCH_OBJ);  
						
						
						/*
						$stmt =  $conn->prepare("select name from sub_job_categories  WHERE  category_id=:id    ");         
						$stmt->bindValue(':id',  $dt->category_id, PDO::PARAM_INT);   
						$stmt->execute();   
						$sub_result = $stmt->fetchAll(PDO::FETCH_OBJ);
						
						$subrole = "";
						
						foreach($sub_result as $dt1)
							$subrole .= $dt1->name.", ";
						*/
						
						$stmt =  $conn->prepare("select name from users  WHERE  cust_id=:cust_id    ");         
						$stmt->bindValue(':cust_id',  $dt->cust_id, PDO::PARAM_INT);   
						$stmt->execute();   
						$cust_id = $stmt->fetch(PDO::FETCH_OBJ);  
						
						$old_date = $dt->posted_date;
						$old_date_timestamp = strtotime($old_date);
						$date = date("d-m-Y H:i", $old_date_timestamp); 

						 
						
			?>
        	<li onclick="location.href='job-details.html'">
			
            	<h2><a href="../<?php echo $dt->url.'_'.$city_id->id;?>" target="_blank"><?php echo $dt->heading;?></a> </h2>
                <div class="labelSpel">URGENT</div>
                <div class="resultType">
                    <div class="resultTypeIcon"><img src="<?php echo ROOTPATH;?>/view/images/clock1.png" alt="img"></div>
                    <span>Monthly <em><?php echo $dt->min_salary;?> - <?php echo $dt->max_salary;?></em> </span>
                </div>
                <div class="resultType">
                	<div class="resultTypeIcon"><img src="<?php echo ROOTPATH;?>/view/images/clock1.png" alt="img"></div>
                    <span>Job Type <em><?php echo $type;?></em> </span>
                </div>
                <div class="resultType">
                    <div class="resultTypeIcon"><img src="<?php echo ROOTPATH;?>/view/images/clock1.png" alt="img"></div>
                    <span>Company <em><?php echo $dt->company;?></em> </span>
                </div>
                <div class="resultType">
                	<div class="resultTypeIcon"><img src="<?php echo ROOTPATH;?>/view/images/clock1.png" alt="img"></div>
                    <span>Experience <em><?php if($dt->expr!='') echo $dt->expr; else echo "Not Mentioned"; ?></em> </span>
                </div>
                 <span class="designation"><?php echo $role->name;?> - <em>Subroles Here</em></span>
				 <span class="loaction"><?php echo $_COOKIE['search_city_name'];?> - <em>Multiple Locations Here...</em> </span>
				 <div class="applyLeft">
				Posted by <b><?php echo $cust_id->name;?></b><br><?php echo $date; ?> </div>
                 <div class="applyRight">
                 	<span>Phone verified</span>
                    <input name="" type="button" value="Apply" class=" btn applyButt">
                 </div>
				 
            </li>
         
          <?php 
			}
			}else
				echo "No job found, Please try different search criteria";
		  ?>
            
        </ul>
    </div>