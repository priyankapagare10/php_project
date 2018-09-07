<?php 	
	include_once('../../config.php'); 
	include_once(ABS_PATH.'/admin/login_check.php');    
	
	if($_POST['adding_excel'])
	{
		$file = fopen("newpackags/delhi-a-m.csv","r");     
		while(! feof($file))
		{
			$pck_dtl  = fgetcsv($file);     
			$ext_id  = $pck_dtl[0];
			$pck_category = 1;  
			$pck_name = $pck_dtl[1];
			$seller_name = $pck_dtl[2];
			$days = $pck_dtl[3];
			$nights = $pck_dtl[4];
			$start_price = $pck_dtl[5];  
			$val = $pck_dtl[6];  
			$heading = str_replace("'", "''", "$pck_name");	 
			$link_url_string = preg_replace('/\s+/', ' ',$heading);

			$link_url_string_ary =  explode(" ",$link_url_string);
			foreach($link_url_string_ary as  $dt) 
				$txt .=$dt.'-';  
			
			$txt .=$pck_dtl[2];    
			//mysql_query("insert into pck_list (cat_id,nights,days,st_price,seller_name,pck_name,inclusion_list,url,is_active) values ($pck_category,$nights,$days,'$start_price','$seller_name','$pck_name','$val','$txt',1) ");    
			$last_id = mysql_insert_id();  
			$main_key = 7; 
			for($i=1;$i<=$days;$i++)
			{ 
				$dt = $pck_dtl[$main_key+$i];
				//mysql_query("insert into pck_dy_vice_iternity (tripid,dys_no,disc ) values ($last_id,$i,'$dt') "); 
			}    
			//mysql_query("update pck_list set about_place = '$pck_dtl[25]'   where id=$last_id ");    
			$dir = ABS_PATH.'/test/newpackags/'.$ext_id;	 
			{
				if ($handle = opendir($dir)) 
				$files=glob($dir."/*.*");   
				foreach($files as $mt)
				{    
					$exptn = explode("/",$mt);
					$exptn1 = explode(".",end($exptn));  
					$f_name = ''; 
					$f_name =  md5(uniqid()) . "." . end($exptn1); 

					$path  = ABS_PATH."/uploads/packages/".$ext_id;
					if (!file_exists($path))
						mkdir($path,0777);		
				
					$target_path = ABS_PATH."/uploads/packages/".$ext_id.'/'.$f_name;//set the target path with a new name of image  
					copy($mt,$target_path);  
					//move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);  
					//mysql_query("insert into pck_pic (tripid,pic_name) values ($last_id,'$f_name') ");	 
				}
			}    
			die;  
		} 
		fclose($file); 
	} 
	include ABS_PATH.'/admin/header.php';	
?>  


 <script>
	$(function() {
		$( "#datepicker" ).datepicker(); 
	}); 
  
	$(document).ready(function()
	{   

	
	$("#product_frm").validate({
		
		errorElement:'div',
		rules:{ 
			city:{
				required:true				 
			} 
			
			
			
		},
		messages:{				
			 
			 city:{
				required:"Enter city name"				 
			} 
		}
	});


	});
 


</script>
		 
		 <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
							<div class="panel-heading">
							
							<?php 
							
								 $result = mysql_query("select * from hotel_main_details where id=$_REQUEST[id] "); 
								 $row = mysql_fetch_object($result);
								 
								 $result_payee = mysql_query("select * from txn_details where txnid='$_REQUEST[payee_txn_id]' "); 
								 $payee_details = mysql_fetch_object($result_payee);
							?>
							<div class="panel-title"> Booking Details of  Mr/Miss  <?php echo $payee_details->firstname;?>  </div>    
								
								<div class="panel-options">  
								   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='book-tickets.php';" /> 
								</div>  
							</div>
							
							 
							 
						
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Upload Excel</label>
								    <div class="col-sm-10">
								      <h5><input type="FILE" name="upload-excel" /></h5>
								    </div> 
								 </div> 
								 <hr> 
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Payee TXN Id</label>
								    <div class="col-sm-10">
								      <h5><?php echo  $row->payee_txn_id;?></h5>
								    </div> 
								 </div>	    
								</form>   
			  				</div>
			  			</div>
	  				</div>
	  				 
	  			</div>

	  			 


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

 
<?php  include ABS_PATH.'/admin/footer.php';	?>  