<?php 	
include_once('../../config.php'); 
include_once(ABS_PATH.'/admin/login_check.php');  

if(isset($_POST['submit']))
{
mysql_query("update piligram set amount=$_POST[amount]  where id=$_REQUEST[id]");	 
header("Location:  default.php "); 
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
			name:{
				required:true				 
			} ,
			amount:{
				required:true				 
			} 	
			
			
			
		},
		messages:{				
			 
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
							
								 $result = mysql_query("select * from piligram where id=$_REQUEST[id] "); 
								 $row = mysql_fetch_object($result);  
							?>
							<div class="panel-title"> <h2> Update    Pilgrimage</h2> </div>    
								
								<div class="panel-options">  
								   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>  
							</div>
							
							
							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
								    <div class="col-sm-10">
								       <input type="text"   name="name" value="<?php echo $row->name;?>"   /> 
								    </div> 
								 </div>
								 <hr>  

								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Amount</label>
								    <div class="col-sm-10">
								       <input type="text"   name="amount" value="<?php echo $row->amount;?>"   /> 
								    </div> 
								 </div>
								  <hr>  
								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Update</label>
								    <div class="col-sm-10">
								       <input type="submit"   name="submit" value="Update"  class="btn btn-warning"  /> 
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