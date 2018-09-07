<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');  

			if(isset($_POST['Submit']))
			{    
                $status=$_POST['status'];
	            $description=$_POST['description'];	   
				$path = ABS_PATH.'/uploads/';
				$filename = substr(md5(time()),0,8);  
				$RD = explode(".",$_FILES['pname']['name']);			
				$target_file = $path.$filename.".".end($RD);;
				$Fname = $filename.'.'.end($RD); 				 
				move_uploaded_file($_FILES['pname']['tmp_name'],$target_file);     
			try
	          {
	   	        $stmt=$conn->prepare("insert into product(name,active,description)values(:pname,:status,:description)");
	   	        $stmt->execute(array(':pname'=>$Fname,':status'=>$status,':description'=>$description));
	   	        echo '<script type="text/javascript">alert("File Uploaded Successfully!!!")</script>'; 
		      }
	          catch(PDOException $e)
             {
                echo $e->getMessage();
		     }
				
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
							
							 
							<div class="panel-title"> Product Details </div>    
								
								<div class="panel-options">  
								   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='book-tickets.php';" /> 
								</div>  
							</div>
							
							 
							 
						
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm"> 
								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
								    <div class="col-sm-10">
									<input type="file" name="pname" class="form-control-file" id="inputPhoto">								      
								    </div> 
								 </div>
								 <hr>
								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-10">
								     <select class="form-control-plaintext" name="status" id="inputState">
                                         <option>Active</option>
                                         <option>Inactive</option>
                                    </select>
								    </div> 
								 </div>
								 <hr>  

								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
								    <div class="col-sm-10">
								<textarea type="text" name="description"  class="form-control-plaintext" id="inputDescription" value="" rows="5" cols="100" placeholder="Description"></textarea>
								    </div> 
								 </div>	 
								  <hr>  
								
								 <div class="form-group" align="center"> 
								   <input type="submit"  class="btn btn-primary" name="Submit"  value="Submit" /> 
								</div>
								 <hr>  
								 
								 
								 
								 
								   
								   
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