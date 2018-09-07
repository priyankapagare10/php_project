<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');  

			if(isset($_POST['submit']))
			{
				mysql_query("insert into custom_city_name (name) values('$_POST[city]') ");					
				 
				header("Location:  default.php "); 
				$msg = "Product has been added successfully..";			
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
								<div class="panel-title"> <h3>Custom Cities </h3></div>    
								
								<div class="panel-options"> 

								   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" />
								  
								</div>
							  
								 
							</div>
							
							
			  				<div class="panel-body">
							
							
								
								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm">
								
								<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">City Name</label>
								    <div class="col-sm-10">
								      <input name="city" class="form-control"   placeholder="City Name"  >
								    </div>
								 </div>
								 <hr>       
								 
								   
								  
								  <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
										<div class="col-sm-10">
										  <input type="submit"    class="btn btn-primary"  name="submit" value="Submit">
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