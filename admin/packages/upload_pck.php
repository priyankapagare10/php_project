<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');    
		
		
		if(isset($_POST['submit']))
		{ 			
			$pck_category = $_SESSION['pck']['pck_category'];
			$pck_name = $_SESSION['pck']['pck_name'];
			$days = $_SESSION['pck']['days'];
			$nights = $_SESSION['pck']['nights'];
			$start_price = $_SESSION['pck']['start_price'];
			$seller_name = $_SESSION['pck']['seller_name'];  

			$val ='';
			for($i=1;$i<=5;$i++)
			{
				if($_POST['inclusion'.$i])
				$val .=$i.','; 
			} 

			$heading = str_replace("'", "''", "$pck_name");	
			
			$link_url_string = preg_replace('/\s+/', ' ',$heading);

			$link_url_string_ary =  explode(" ",$link_url_string);
			foreach($link_url_string_ary as  $dt)
			{
			$txt .=$dt.'-'; 
			}
			$txt .=$_SESSION['pck']['seller_name']; 


			mysql_query("insert into pck_list (cat_id,nights,days,st_price,seller_name,pck_name,inclusion,url,inclusion_list,is_active) values ($pck_category,$nights,$days,'$start_price','$seller_name','$pck_name','$val','$txt','$_POST[inclusion_list]',$_POST[is_active]) ");  
			$last_id = mysql_insert_id();  
			foreach	($_POST['days'] as $ky=>$dt )			
			{
				$ky +=1; 
				mysql_query("insert into pck_dy_vice_iternity (tripid,dys_no,disc ) values ($last_id,$ky,'$dt') ");
			} 
			    
			mysql_query("update pck_list set about_place = '$_POST[about_place]'   where id=$last_id ");   
			$j = 0; //Variable for indexing uploaded image   
			for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
			{
				//loop to get individual element from the array 
				$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
				$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
				$file_extension = end($ext); //store extensions in the variable
				
				$f_name = ''; 
				$f_name =  md5(uniqid()) . "." . $ext[count($ext) - 1];  
				$target_path = ABS_PATH."/uploads/packages/".$f_name;//set the target path with a new name of image
				$j = $j + 1;//increment the number of uploaded images according to the files in array       
			  
			    move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);  
				mysql_query("insert into pck_pic (tripid,pic_name) values ($last_id,'$f_name') ");	
			} 
		}  
		

		if(isset($_POST['update']))
		{  
			
			$pck_category = $_SESSION['pck']['pck_category'];
			$pck_name = $_SESSION['pck']['pck_name'];
			$days = $_SESSION['pck']['days'];
			$nights = $_SESSION['pck']['nights'];
			$start_price = $_SESSION['pck']['start_price'];
			$seller_name = $_SESSION['pck']['seller_name'];  
			
			$last_id = $_POST['last_id'];  
			$val ='';
			for($i=1;$i<=5;$i++)
			{
				if($_POST['inclusion'.$i])
				$val .=$i.','; 
			} 
			
			$heading = str_replace("'", "''", "$pck_name");	

			$heading = str_replace("'", "''", "$pck_name");	
			
			$link_url_string = preg_replace('/\s+/', ' ',$heading);

			$link_url_string_ary =  explode(" ",$link_url_string);
			foreach($link_url_string_ary as  $dt)
			{
			$txt .=$dt.'-'; 
			}
			$txt .=$_SESSION['pck']['seller_name']; 
			 
			
			mysql_query("update  pck_list set cat_id=$pck_category , nights=$nights ,days =$days ,st_price='$start_price' , seller_name = '$seller_name' ,pck_name = '$pck_name' ,  about_place ='$_POST[about_place]', inclusion ='$val' ,	inclusion_list = '$_POST[inclusion_list]' ,  url='$txt'  , is_active=$_POST[is_active] where id=$last_id ");   
			
			mysql_query("delete from  pck_dy_vice_iternity where tripid = $last_id "); 
			foreach	($_POST['days'] as $ky=>$dt )			
			{
				$ky +=1; 
				mysql_query("insert into pck_dy_vice_iternity (tripid,dys_no,disc) values ($last_id,$ky,'$dt') ");  
			}  
			 
			
			if($_FILES['file']['name'][0]!='') 
			{
				$j = 0; //Variable for indexing uploaded image   
				for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
				{
					//loop to get individual element from the array 
					$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
					$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
					$file_extension = end($ext); //store extensions in the variable
					
					$f_name = ''; 
					$f_name =  md5(uniqid()) . "." . $ext[count($ext) - 1];  
					$target_path = ABS_PATH."/uploads/packages/".$f_name;//set the target path with a new name of image
					$j = $j + 1;//increment the number of uploaded images according to the files in array  
					move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);   
					
						
					$filename =  rand(23456,234);						 
					$dest_file = ABS_PATH."/uploads/packages/".$filename;//set the target path with a new name of image					
					$Fname = $filename.'.'.$ext[count($ext) - 1];  
					shell_exec("convert  -resize 500X350 $target_path $dest_file ");		  
					unlink($target_path);     
					mysql_query("insert into pck_pic (tripid,pic_name) values ($last_id,'$Fname') ");	
				} 
			}
		} 
		
	 

		
		header("Location: default.php");
?>