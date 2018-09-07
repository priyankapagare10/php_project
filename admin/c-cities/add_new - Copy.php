<?php 	include_once('../../config.php');   	

			if(isset($_POST['submit']))
			{
				mysql_query("insert into custom_city_name (name) values() ");					
				 
				header("Location:  default.php "); 
				$msg = "Product has been added successfully..";			
			}  
?>  
<?php  include '../header.php';	?>  


 <script>
  $(function() {
    $( "#datepicker" ).datepicker(); 
  });
  
  
  
  $(document).ready(function()
  {   
  
   
  
	ct=1; 

	$("#addCF").click(function(){
	ct++;
	$("#addnewrecord").append('<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Chapter Heading</label><div class="col-sm-10"><input  class="form-control"   placeholder="Chapter Heading" name="ch_heading'+ct+'" required="required" ></div></div><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Chapter Heading</label><div class="col-sm-10"><input type="file"  name="ch_file'+ct+'"  required="required"></div></div> <hr>'); 
	$("#count_val").val(ct);
	});  

	$.validator.addMethod("names", function(value, element, regexpr) {          
		return regexpr.test(value);
	}, "Please enter alphanumaric only.");

	$("#product_frm").validate({ 
		errorElement:'div',
		rules:{ 
			title:{
				required:true 
				//names: /^[a-zA-Z0-9 ]*$/		
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
								<div class="panel-title"> <h3>Crime In Maharashtra</h3></div>    
								
								<div class="panel-options"> 

								   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" />
								  
								</div>
							  
								 
							</div>
							
							
			  				<div class="panel-body">
							
							
								
								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="product_frm">
								
								<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
								    <div class="col-sm-10">
								      <input name="title" class="form-control"   placeholder="Title"  >
								    </div>
								 </div>
								 <hr>       
								 
								 <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">  </label>
										<div class="col-sm-10" id="addCF">
										 <a href="javascript:void(0)" class="btn btn-success" > Add New  Chapter + </a>
										</div>
								</div>
									  
								  <div id="addnewrecord">	
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Chapter Heading</label>
										<div class="col-sm-10">
										  <input name="ch_heading1"class="form-control"   placeholder="Chapter Heading" required="required">
										</div>
									  </div>
									  
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">PDF</label>
										<div class="col-sm-10">
										  <input type="file" name="ch_file1"  required="required">
										</div>
									  </div> 
									  <hr>
									  
									  
									  
								  </div>    
								  
								  <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
										<div class="col-sm-10">
										  <input type="submit"    class="btn btn-primary"  name="submit" value="Submit">
										</div>
								  </div> 
								   <input type="hidden" value="1"  id="count_val" name="count_val"  />
									  
								</form>
								
								
							
			  				</div>
			  			</div>
	  				</div>
	  				 
	  			</div>

	  			 


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

<?php  include '../footer.php';	?>     