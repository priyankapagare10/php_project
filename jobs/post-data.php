<?php 	
	include_once('../config.php');  

	echo '<pre>'; print_r($_POST);
//	die;

	function mail_calling($contact_email)
		{    
			$Ticket_data =  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
			<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<title>Newsletter</title>
			</head>
			<body>
			<div style='width:600px; margin:0px auto; border:1px solid #ddd; background:#f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#444; '>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<tr>
			<td height='150' align='center' valign='middle' bgcolor='#FFFFFF'><img  src='".MAIN_ROOTPATH."/uploads/mail-images/banner.png' alt='img' /></td>
			</tr>
			<tr>
			<td style='background:url('".MAIN_ROOTPATH."/uploads/mail-images/shadow.png) repeat-x left top;'>&nbsp;</td>
			</tr>
			<tr>
			<td>
			<div style=' display:block;padding:1px 20px 15px; color:#333; font-size:19px; line-height:28px ; text-align:left;'>Hello user,<br />
			<span style='color:#e90021;'>Congratulations! </span>You have successfully posted a job 
			</div>
			</td>
			</tr>



			<tr>
			<td bgcolor='#f3f3f3'>
			<div style='padding:20px; display:block;'>
			<div style='width:20%; text-align:center; float:left; display:inline-block; padding-bottom:20px;'>
			<img  src='".MAIN_ROOTPATH."/uploads/mail-images/alert.png' width='49' height='43' alt='img' />
			</div>
			<div style='width:79%; float:right; text-transform:uppercase; display:inline-block; font-weight:bold; color:#333; font-size:15px;'>
			Beware of fraud Agents!
			Do not pay money for getting a job
			</div>
			<div style='clear:both'></div>
			<p style=' border-top:1px dotted #b9b9b9; margin:0px; padding-top:17px; font-size:13px; color:#666;'>
			<a href='http://www.laaibhari.com' style='color:#008acc'>Lai Bhari</a> is the fastest growing site in india , get quick and guaranteed response. Become paid member and enjoy more response from Laai Bhari.
			</p>
			</div>
			</td>
			</tr>  
			</table> 
			</div> 
			</body>
			</html>  
			"; 
			
			
			$to= $contact_email;
			$from = "support@laaibhari.com";
			$subject = "New Job Posted";   
			$message = "";  
			//end of message    
			$message .= '<br><br>'.$Ticket_data;    
			$headers  = "From: $from\r\n";
			$headers .= "Content-type: text/html\r\n";    
			mail($to, $subject, $message, $headers);

			
		}	
	
	 
	if($_POST['locations_val'])
		$location_id = $_POST['locations_val'];
	else
		$location_id = 0;
	
	if($_POST['sub-roles'])
	{
		foreach($_POST['sub-roles'] as $dt)
			$sub_category_id .= $dt.','; 
		$sub_category_id = rtrim($sub_category_id,",");	
	}
	else
		$sub_category_id = 0;
	
	 
	
	$posted_date =  date('Y-m-d H:i:s');
	$tabel_name = "city_tabel_".trim($_POST['search_city_id_hidden']);    
	
	$stmt =  $conn->prepare("select user_type from paid_members where cust_id ='$_COOKIE[site_cust_id]' and post_id = 1 and category_id = $_POST[job_cat_val] and city_id = $_POST[search_city_id_hidden] ");
	$stmt->execute(); 
	$user_type_ary = $stmt->fetch(PDO::FETCH_OBJ);         
	
	
	if( (empty($user_type_ary)) || ($user_type_ary==null) )
		$user_type = 0;
	else
		$user_type = $user_type_ary->user_type;  
	
	if($_POST[privacy])
		$privacy = 1;
	else
		$privacy = 0;

	$val = substr((rand(43577,134)),0,12);
	$heading = str_replace("'", "''", $_POST['title']); 
	$heading = preg_replace('/[^A-Za-z0-9\- ]/', '', $heading);   		
	$heading_explode = explode(" ",$heading);   
	$url =  implode("-",array_slice($heading_explode, 0, 12)).'-'.$val;
	
	
	try 
	{   
		//$conn->beginTransaction();         
		$stmt =  $conn->prepare("insert into  $tabel_name (type,category_id,heading,sub_category_id,min_salary,max_salary,min_expr,max_expr,description,location_id,contact_email,contact_mobile,cust_id,posted_date,company,privacy,post_id,user_type,url) values(:type,:category_id,:heading,:sub_category_id,:min_salary,:max_salary,:min_expr,:max_expr,:description,:location_id,:contact_email,:contact_mobile,:cust_id,:posted_date,:company,:privacy,:post_id,:user_type,:url)");        
		
		$stmt->bindValue(':type', $_POST['type'], PDO::PARAM_INT); 
		$stmt->bindValue(':category_id', $_POST['job_cat_val'], PDO::PARAM_INT);  
		$stmt->bindValue(':heading', $_POST['title'], PDO::PARAM_STR); 
		$stmt->bindValue(':sub_category_id', $sub_category_id, PDO::PARAM_STR); 
		$stmt->bindValue(':min_salary', $_POST['min_sal'], PDO::PARAM_INT); 
		$stmt->bindValue(':max_salary', $_POST['max_sal'], PDO::PARAM_INT); 
		
		$stmt->bindValue(':min_expr', $_POST['min_exp'], PDO::PARAM_INT); 
		$stmt->bindValue(':max_expr', $_POST['max_exp'], PDO::PARAM_INT); 
		$stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR); 		
		$stmt->bindValue(':location_id', $location_id, PDO::PARAM_STR); 
		$stmt->bindValue(':contact_email', $_POST['email'], PDO::PARAM_STR); 
		$stmt->bindValue(':contact_mobile', $_POST['mobile'], PDO::PARAM_STR); 
		$stmt->bindValue(':cust_id', $_COOKIE['site_cust_id'], PDO::PARAM_STR); 
		$stmt->bindValue(':posted_date', $posted_date, PDO::PARAM_STR); 
		$stmt->bindValue(':company', $_POST['company_name'], PDO::PARAM_STR); 
		$stmt->bindValue(':privacy', $privacy, PDO::PARAM_INT); 
		$stmt->bindValue(':post_id', 1, PDO::PARAM_INT); 
		$stmt->bindValue(':user_type', $user_type, PDO::PARAM_INT); 
		$stmt->bindValue(':url', $url, PDO::PARAM_STR); 
		$stmt->execute();      
		$last_id  = $conn->lastInsertId();  
	}
	catch (Exception $e)
	{  
		$stmt =  $conn->prepare("CREATE TABLE $tabel_name ( id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, posted_date varchar(200) NOT NULL, company varchar(200) NOT NULL, type tinyint(1) NOT NULL COMMENT 'work from home => 1 part time => 2 full time => 3 internship job => 4', heading text NOT NULL, category_id int(11) NOT NULL,   sub_category_id varchar(200) NOT NULL,  min_salary varchar(200) NOT NULL,  max_salary varchar(200) NOT NULL,  min_expr int(11) NOT NULL,  max_expr int(11) NOT NULL, description text NOT NULL, location_id varchar(200) NOT NULL,  contact_email varchar(200) NOT NULL,  contact_mobile varchar(200) NOT NULL,  cust_id varchar(200) NOT NULL,add_view int(11) NOT NULL,privacy int(11) NOT NULL,post_id int(11) NOT NULL,user_type tinyint(1) NOT NULL,enq tinyint(1) NOT NULL,service_image varchar(200) NOT NULL,url varchar(200) NOT NULL)  "); 
		$stmt->execute();  
		
		$stmt =  $conn->prepare("insert into  $tabel_name (type,category_id,heading,sub_category_id,min_salary,max_salary,min_expr,max_expr,description,location_id,contact_email,contact_mobile,cust_id,posted_date,company,privacy,post_id,user_type,url) values(:type,:category_id,:heading,:sub_category_id,:min_salary,:max_salary,:min_expr,:max_expr,:description,:location_id,:contact_email,:contact_mobile,:cust_id,:posted_date,:company,:privacy,:post_id,:user_type,:url)");        
		
		$stmt->bindValue(':type', $_POST['type'], PDO::PARAM_INT); 
		$stmt->bindValue(':category_id', $_POST['job_cat_val'], PDO::PARAM_INT);  
		$stmt->bindValue(':heading', $_POST['title'], PDO::PARAM_STR); 
		$stmt->bindValue(':sub_category_id', $sub_category_id, PDO::PARAM_STR); 
		$stmt->bindValue(':min_salary', $_POST['min_sal'], PDO::PARAM_INT); 
		$stmt->bindValue(':max_salary', $_POST['max_sal'], PDO::PARAM_INT); 
		
		$stmt->bindValue(':min_expr', $_POST['min_exp'], PDO::PARAM_INT); 
		$stmt->bindValue(':max_expr', $_POST['max_exp'], PDO::PARAM_INT); 
		$stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR); 		
		$stmt->bindValue(':location_id', $location_id, PDO::PARAM_STR); 
		$stmt->bindValue(':contact_email', $_POST['email'], PDO::PARAM_STR); 
		$stmt->bindValue(':contact_mobile', $_POST['mobile'], PDO::PARAM_STR); 
		$stmt->bindValue(':cust_id', $_COOKIE['site_cust_id'], PDO::PARAM_STR); 
		$stmt->bindValue(':posted_date', $posted_date, PDO::PARAM_STR); 
		$stmt->bindValue(':company', $_POST['company_name'], PDO::PARAM_STR); 
		$stmt->bindValue(':privacy', $privacy, PDO::PARAM_INT); 
		$stmt->bindValue(':post_id', 1, PDO::PARAM_INT); 
		$stmt->bindValue(':user_type', $user_type, PDO::PARAM_INT); 
		$stmt->bindValue(':url', $url, PDO::PARAM_STR); 
		$stmt->execute();      
		$last_id  = $conn->lastInsertId();
	}   
	
	
	$stmt = $conn->prepare("update users set post_added = post_added+1 where  cust_id=:cust_id "); 
	$stmt->bindValue(':cust_id', $_COOKIE['site_cust_id'], PDO::PARAM_STR); 
	$stmt->execute(); 
	
	$stmt = $conn->prepare("select user_jobs  from users where cust_id=:cust_id "); 
	$stmt->bindValue(':cust_id', $_COOKIE['site_cust_id'], PDO::PARAM_STR); 
	$stmt->execute();   
	$user_job_ct = $stmt->fetch(PDO::FETCH_OBJ);       
	$city_id = $_POST['search_city_id_hidden'];
	if (!preg_match('/'.$city_id.'/',$user_job_ct->user_jobs))
	{  
		$user_jobs = $user_job_ct->user_jobs.",".$_POST['search_city_id_hidden'];  
		$user_jobs = trim($user_jobs,",");     
		$stmt = $conn->prepare("update users set user_jobs = '$user_jobs' where cust_id='$_COOKIE[site_cust_id]' "); 
		$stmt->execute();   
	}  
 
	$alert_tabel = "alert_tabel_".$_POST['search_city_id_hidden'];    
	$lc_id ='%'.$_POST['locations_val'].'%'; 	 
	if($_POST['locations_val'])
		$location_id = " and location_id like '".$lc_id."' and";
	else
		$location_id = " and";      
	
	try 
	{    
		$stmt =  $conn->prepare("select cust_id from $alert_tabel  where type=$_POST[type]   and category_id = $_POST[category_id]   $location_id    alert_for = 2 ");     
		$stmt->execute();  
		$dt = $stmt->fetchAll(PDO::FETCH_OBJ);      
		foreach($dt as $row) 
		{     
			$stmt =  $conn->prepare("select token_id from users where cust_id = '$row->cust_id'  ");     
			$stmt->execute();  
			$token_id = $stmt->fetch(PDO::FETCH_OBJ);    
			$url = 'https://fcm.googleapis.com/fcm/send';   
			$Token = $token_id->token_id;    
			$fields = array("to" => $Token ,"data" => array("message"=>"New Job Posted","job_id" => $last_id ,"city_id" => $_POST['search_city_id_hidden']  ));  
			define('GOOGLE_API_KEY', 'AAAA7mjq6VI:APA91bF6m_VIWv8vQJPB0S3-RJz6xIKhkzXYaJv95WZPgnJsO3c2-nHwji_LNPFQSwOibEIaCzwdEkX9BymdSfrQRPHTOuNSMpIn-o8jBZK7Mv94ds2jQ-nJQ7XlEcImoHQutOJcHGwO'); 
			$headers = array(
			'Authorization:key='.GOOGLE_API_KEY,
			'Content-Type: application/json'
			);   
			
			$curl = curl_init(); 
			curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>json_encode($fields),
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_SSL_VERIFYPEER => false,
			)); 
			curl_exec($curl);  
		}  	
						
	} 
	catch (Exception $e)
	{
		 
	}  
	//if($_POST['email'])
		//mail_calling($_POST['email']);    
	 
	 	
	 
	
?>
		
		
		 