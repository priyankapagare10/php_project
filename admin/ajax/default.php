<?php 
	include_once('../../config.php');    
	
	if(isset($_POST['del_city_names']))		
	{
		mysql_query("delete from custom_city_name where id=$_POST[val] ");  
		die;
	}  
	
	if(isset($_POST['update_status']))		
	{
		mysql_query("update refund_amount set status=1 where id=$_POST[val] ");  
		die;
	}   

	if(isset($_POST['delete_pck_img']))		
	{
		 
		mysql_query("delete from pck_pic where pic_name='$_POST[name]' ");  
		unlink(ABS_PATH."/uploads/packages/".$_POST['name']);
		die;
	} 
	
	if(isset($_POST['enquiery']))		
	{	  
		mysql_query( "update  enquery set is_active = $_POST[status] where id = $_POST[id]");   
		die;
	}

	if(isset($_POST['del_full_pck']))		
	{
		$img_result = mysql_query("select pic_name from  pck_pic where tripid=".$_POST['val']." ");
		while($row = mysql_fetch_row($img_result))		 
			unlink(ABS_PATH.'/uploads/packages/'.$row[0]);  
		
		mysql_query("delete from  pck_pic where tripid=".$_POST['val']." ");
		mysql_query("delete from  pck_dy_vice_iternity where tripid=".$_POST['val']." ");
		mysql_query("delete from  pck_list where id=".$_POST['val']." "); 
		die;
	} 
	
	if(isset($_POST['payment_clearing']))		
	{ 
		mysql_query("update txn_details set clearing=1 where id=$_POST[id]  ");   
		die;
	} 
?> 