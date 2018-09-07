<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');  
		
		if(isset($_POST['submit']))
		{
			mysql_query("update hotel_detail set is_active=$_POST[active_val] where id= $_REQUEST[id]  ");   
			mysql_query("update hotel1 set is_active=$_POST[active_val] where hotel_id= $_REQUEST[id]  ");   
			header("Location: default.php");
		}

			  
?>  
<?php  include ABS_PATH.'/admin/header.php';	?>  


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
								$result = mysql_query("select is_active from hotel1 where hotel_id = $_REQUEST[id]  ");   
								$details = mysql_fetch_object($result);    
								
								 
							?>
							
								<div class="panel-title"> <h3>Hotel Details </h3>   </div>  
									
								<div class="panel-options">  
									   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>  
								
							</div>  
								
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								<hr>    
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Update</label>
								    <div class="col-sm-10">
									
								       <select name="active_val">
									   <option value="1" <?php if($details->is_active==1) echo 'selected=selected'; ?> >Active</option>
									   <option value="0"  <?php if($details->is_active==0) echo 'selected=selected'; ?> >Inactive</option> 
									   </select>
									   
								    </div> 
								</div>	

								<hr>
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Hotel name</label>
								    <div class="col-sm-10">
								      <input type="submit" name="submit" value="Update" class="btn btn-warning"  />
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