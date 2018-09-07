<?php 	include_once('../../config.php'); 
		include_once(ABS_PATH.'/admin/login_check.php');   
		$pck_category_result = mysql_query("select * from pck_category "); 
		
		$_SESSION['pck'] = null; 
		if(isset($_POST['submit']))
		{    
			$_SESSION['pck']['pck_category'] =  $_POST['pck_category'];
			$_SESSION['pck']['pck_name'] =  $_POST['pck_name'];
			$_SESSION['pck']['days'] =  $_POST['days'];
			$_SESSION['pck']['nights'] =  $_POST['nights'];
			$_SESSION['pck']['start_price'] =  $_POST['start_price'];
			$_SESSION['pck']['seller_name'] =  $_POST['seller_name'];    
		}    
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
				} ,
				days:{
					required:true,
					number:true	
				} ,
				nights:{
					required:true,
					number:true	
				} ,
				start_price:{
					required:true,
					number:true	
				},
				seller_name:{
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
					   <?php 
							if($_SESSION['pck']=='')
							{
					   ?>
						<div class="content-box-large">
							<div class="panel-heading">  
								<div class="panel-title"> <h2> Add New Package</h2> </div>     
								<div class="panel-options">  
									   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>   
							</div>  
							
			  				<div class="panel-body">  								 
							<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"    id="product_frm"> 
							<div class="form-group"> 
								
									<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
								    <div class="col-sm-10"> 
									  <!--<select name="pck_category" class="form-control" > -->
									  <select name="pck_category" class="btn btn-primary" > 
									  <?php 
										while($row = mysql_fetch_object($pck_category_result))
										{
									  ?>
									  <option value="<?php echo $row->id;?>"> <?php echo $row->name; ?> </option>
									<?php } ?> 
									  </select>  
								    </div> 
									
							 </div>   
								 <hr>  
									 
							<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Package Name</label>
								    <div class="col-sm-10">
								      <input  name="pck_name" />
								    </div> 
							 </div>
							 <hr>  
								 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">No of Days</label>
								    <div class="col-sm-10">
								      <input  name="days" />
								    </div> 
								 </div>
								 <hr>  	
								 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">No of Nights</label>
								    <div class="col-sm-10">
								      <input  name="nights" />
								    </div> 
								 </div>
								 <hr>  

								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Starting Price</label>
								    <div class="col-sm-10">
								      <input  name="start_price" />  <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" />
								    </div> 
								 </div>
								 <hr>  	
								 
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Seller Name</label>
								    <div class="col-sm-10">
								      <input  name="seller_name" />
								    </div>  
								 </div>
								 <hr>   

								 	
								 
								 <div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
								    <div class="col-sm-10">
								      <input  name="submit" value="Submit"  type="submit"  class="btn btn-warning"/>
								    </div> 
								 </div>  
								</form>   
			  				</div> 
			  			</div>
						
						<?php 
							}
							else{
						?>
						<div class="content-box-large">
							<div class="panel-heading">  
							<div class="panel-title"> <h2> Complete your package information </h2> </div>     
							 
							
							
								<div class="panel-options">  
										   <input type="button"  class="btn btn-warning" name="btnback" id="btnback" value=" Back " onClick="javascript:location.href='default.php';" /> 
								</div>   
							</div>  
						 
							
			  				<div class="panel-body">  								 
			  					<form class="form-horizontal" role="form" method="post" action="upload_pck.php" enctype="multipart/form-data" id="info_form">   
							     <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Package Name</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['pck_name']; ?></h4>
								    </div>  
								 </div>
								 
								  
								 <hr>  
								 
								 <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Seller Name</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['seller_name']; ?></h4>
								    </div>  
								 </div>
								  
								 <hr>  
								  <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >No of Days</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['days']; ?></h4>
								    </div>  
								 </div>
								  
								 <hr>  
								   <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >No of Nights</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['nights']; ?></h4>
								    </div>  
								 </div>
								 
								 <hr>
							   <div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label" >Starting Price</label>
								    <div class="col-sm-10">   
									  <h4><?php echo $_SESSION['pck']['start_price']; ?>  <img src="<?php echo ROOTPATH;?>/view/images/rupee_icon.png" /> </h4> 
								    </div>  
								 </div>
								 
								 
								 <hr>  
								 
								
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Add Images</label>
								    <div class="col-sm-10">  
									<input name="file[]" type="file" id="file"/> 
									<input type="button" id="add_more" class="upload" value="Add More Images" required="required" /> 
								    </div>  
								 </div>
								 <hr>  
								 
								 <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Inclusion</label>
								    <div class="col-sm-offset-2 col-sm-10">
								      <div class="checkbox">
								        <label>
								          <input type="checkbox" value="1"  name="inclusion1"> Flight
								        </label>
								      </div>
									  
								      <div class="checkbox">
								        <label>
								         <input type="checkbox" value="2"  name="inclusion2" > Hotel
								        </label>
								      </div>
									  
									<div class="checkbox">Transfer
								        <label>
								         <input type="checkbox" value="3"  name="inclusion3" > Transfer
								        </label>
								      </div>

									 <div class="checkbox">Meal
								        <label>
								         <input type="checkbox" value="4"  name="inclusion4" > Meal
								        </label>
								      </div>

									<div class="checkbox">Sightseeing
								        <label>
								         <input type="checkbox" value="5"  name="inclusion5"> Sightseeing
								        </label>
								    </div>		
									  
									  
								    </div>
								  </div>

								  
								 <hr> 


								<?php 
									for($i=1; $i<=$_SESSION['pck']['days'];$i++)
									{
								?> 
								
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Day - <?php echo $i;?></label>
								    <div class="col-sm-10"> 
									<textarea class="form-control" placeholder="Day <?php echo $i;?> info" name="days[]"  required="required" rows="3"></textarea>	
								    </div>  
								</div>
								 
								<?php } ?> 
								<hr> 
								 
								  
								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">About the place</label>
								    <div class="col-sm-10"> 
									<textarea class="form-control" placeholder="About the place" name="about_place"   rows="3"></textarea>	
								    </div>  
								 </div>
								 <hr> 


								<div class="form-group"> 
									<label for="inputEmail3" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-10">
								      <select name="is_active">
									  <option value="1">Active</option>
									  <option value="0">Inactive</option>
									  </select>
								    </div>  
								 </div>	
									
									<hr> 	
								
								 
								 <div class="form-group">  
								    <label for="inputEmail3" class="col-sm-2 control-label">Submit</label>
								    <div class="col-sm-10">
								      <input  name="submit" value="Submit"  type="submit"  class="btn btn-warning"/>
								    </div> 
								 </div>
								 
								</form>   
			  				</div>
			  			</div> 
						
						
					<?php  } ?>
	  				</div> 
					
				 
					
					
					 
						
	  				</div>
					
					
	  				 
	  			</div>

	  			 


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

 
<?php  include ABS_PATH.'/admin/footer.php';	?>  
<script src="script.js"></script>