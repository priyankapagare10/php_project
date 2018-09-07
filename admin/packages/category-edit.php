<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');    
		
	 
		if(isset($_POST['submit']))
		{   
		 
			 if($_FILES['pck_img']['name'])
			 {  
				$imge =  $_FILES['pck_img']['name']; 
				$ext = explode('.',basename($_FILES['pck_img']['name']));//explode file name from dot(.) 
				$file_extension = end($ext); //store extensions in the variable  
				$f_name =  md5(uniqid()) . "." . $ext[count($ext) - 1];    
				$target_path = ABS_PATH."/uploads/packages-category/".$f_name;//set the target path with a new name of image 
				unlink( ABS_PATH."/uploads/packages-category/".$_POST['old_image']); 
			    move_uploaded_file($_FILES['pck_img']['tmp_name'], $target_path);  
				mysql_query("update pck_category set  name='$_POST[pck_name]', image ='$f_name',is_active = $_POST[active_val]  where id=$_REQUEST[id] "); 	
			 }else
			 mysql_query("update pck_category set  name='$_POST[pck_name]' , is_active = $_POST[active_val] where id=$_REQUEST[id] ");
			 
			header("Location: category.php"); 
		}
		
		$pck_result = mysql_query("select * from  pck_category  where id=$_REQUEST[id] ");			 
		$pck_detail = mysql_fetch_object($pck_result);			 
		include ABS_PATH.'/admin/header.php';
		 
		
?>    
<link rel="stylesheet" type="text/css" href="style.css">    
<script> 
$(document).ready(function()
{   

	$("#product_frm").validate({
		
			errorElement:'div',
			rules:{ 
				pck_name:{
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
								<div class="panel-title"> Edit Package Category  </div>     
								<div class="panel-options">  
									   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='category.php';" /> 
								</div>   
							</div>  
							
									

							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"    id="product_frm"> 
								 <hr>  
								 <div class="form-group"> 
								
									<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
								    <div class="col-sm-10">  
										<input  value="<?php echo $pck_detail->name;?>" name="pck_name" />
								    </div>  
								</div>   
								 <hr>
								
								<div class="form-group">  
									<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
								    <div class="col-sm-10">  
										<input type="file" name="pck_img" />
										<img src="<?php echo ROOTPATH;?>/uploads/packages-category/<?php echo $pck_detail->image;?>" width="50" height="50" />	 
										<input  name="old_image"  type="hidden"  value="<?php echo $pck_detail->image;?>" /> ( Recommended size 290 x 403 px)									
								    </div>  
								</div>  
								<hr>
								
								<div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-10">
									
								       <select name="active_val" class="btn btn-primary" > 
									   <option value="1" <?php if($pck_detail->is_active==1) echo 'selected=selected'; ?> >Active</option>
									   <option value="0"  <?php if($pck_detail->is_active==0) echo 'selected=selected'; ?> >Inactive</option> 
									   </select>
									   
								    </div> 
								</div>	 
								<hr>	
								
								 <div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
								    <div class="col-sm-10">
								      <input  name="submit" value="Update"  type="submit"  class="btn btn-warning"/>
								    </div> 
								 </div>  
								</form>   
			  				</div> 
			  			</div>
						
						 
					 
						
				 
	  				</div>   
	  				</div>  
	  			</div>   

	  		<!--  Page content -->
		  </div>
		</div>
    </div>

 
<?php  include ABS_PATH.'/admin/footer.php';	?>  
<script src="script.js"></script>